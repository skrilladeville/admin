<?php
/** 3748 wp-includes\functions.php
 * Determine if SSL is used.
 *
 * @since 2.6.0
 *
 * @return bool True if SSL, false if not used.
 */
function isSSL() {
	if ( defined ('AT_CANSPACE_SERVER') )
		return true;
		
	if ( isset($_SERVER['HTTPS']) ) {
		if ( 'on' == strtolower($_SERVER['HTTPS']) )
			return true;
		if ( '1' == $_SERVER['HTTPS'] )
			return true;
	}
	
	
	if ( isset($_SERVER['SERVER_PORT']) && ( '443' == $_SERVER['SERVER_PORT'] ) ) {
		return true;
	}
	
	return false;
}

/** Breakup a url into its parts
		$url = 'http://www.hostname.com/dir1/dir2/dir3/filename.ext?query1=qvalue1&query2=qvalue2';
		[scheme] => http
    [host] => www.hostname.com
    [path] => /dir1/dir2/dir3/filename.ext
    ['subpath'] => dir1/dir2/dir3/
    [query] => query1=qvalue1&query2=qvalue2
		[baseurl] => http://www.hostname.com/dir1/dir2/dir3/filename.ext
		[baseurlpath] => http://www.hostname.com/dir1/dir2/dir3/
    [query1] => qvalue1
    [query2] => qvalue2
    [file] => filename.ext
    [ext] => ext
    [filename] => filename
    [subdir1] => dir1
    [subdir2] => dir2
    [subdir3] => dir3
    [updir1] => dir3
    [updir2] => dir2
    [updir3] => dir1
		[totaldirs] => 3
 */
function parseURLparts( $url ){
	global $urlBase;
	
	if( is_array( $url ) )
		$url = $url[0];
	
	// any local URL will be treated like remote
	if( defined( 'AT_LOCALHOST' ) )
		$url = str_replace( $urlBase,'http://',$url );
	
	$urlParts = parse_url( $url );
	//print_r( $urlParts );
	
	// DETECT MALFORMED URL
	// https:/static.nyt.com/
	list( $urlParts['baseurl'],$urlR ) = explode( '?',$url );
	
	// NYT MALFORMED URL
	// https://www.nytimes.com/https://static01.nyt.com/slideshow/2017/03/20/magazine/aloha-time.html
	if( false !== strpos( $urlParts['path'],'://' ) ){
		list( $pathL,$pathR ) = explode( ':/',$urlParts['path'] );
		$url = sprintf( '%s://%s?%s',$urlParts['scheme'],ltrim( $pathR,'/' ),$urlR );
		$urlParts = parse_url( $url );
	}
			
	parse_str( $urlParts['query'], $queryParse );
	foreach( $queryParse as $name => $value ) {
		$urlParts[$name] = $value;
	}
	
	$dirX = explode( '/',$urlParts['path'] );
	
	// FILE
	if( end ( $dirX ) ) {
	// using if(	$urlParts['file'] = basename( $urlParts['path'] ) ) returns folder name on URLS without specified file
		$urlParts['file'] = basename( $urlParts['path'] );
		
		if( false !== strpos( $urlParts['file'],'.' ) ){
			$fileX = explode( '.',$urlParts['file'] );
			$urlParts['ext'] = end( $fileX );
			unset( $fileX[count( $fileX )-1] );
			$urlParts['filename'] = implode( '.',$fileX );
		} else
			$urlParts['filename'] = $urlParts['file'];
			
		//list( $urlParts['filename'],$urlParts['ext'] ) = explode( '.',$urlParts['file'] );
	}
	
	$urlParts['baseurlpath'] = $urlParts['file'] ? preg_replace( '/'.preg_quote( $urlParts['file'] ).'$/','',$urlParts['baseurl'] ) : $urlParts['baseurl'];
	
	// SUBDIRECTORIES in 
	// order from top
	$k = 1;
	foreach ( $dirX as $key => $value ) {
		if ( $value && $value != $urlParts['file'] ) {
			$urlParts['subdir' . $k] = $value;
			$urlParts['subpath'] .= $value . '/';
			$k++;
		}
	}
	
	// order by parent
	$k = 1;
	$dirX = array_reverse ( $dirX );
	foreach ( $dirX as $key => $value ) {
		if ( $value && $value != $urlParts['file'] ) {
			$urlParts['updir' . $k] = $value;
			$k++;
		}
	}
	
	// count dirs to root
	$urlParts['totaldirs'] = $k-1;
	
	return $urlParts;
}

/** RELATIVE PATH to target directory
	*
	* $targetLevel is number of dirs from siteroot
	* Level 0 is siteroot
	* can be used to calculate for site $root_path = goToDirLevel ( 0 );
	* TODO: return ./ if currentLevel is same as targetLevel
	*/
function goToDirLevel ( $targetLevel, $appendDirPath = '' ) {
	global $thisURLpart, $siteRootSubdirDepth;
	
	$currentLevel = $thisURLpart['totaldirs'] - $siteRootSubdirDepth;
	/*$siteRootLevel = $siteRootSubdirDepth;
	$totalDirsToTarget = $currentLevel - ($targetLevel+$siteRootLevel);*/
	$totalDirsToTarget = $thisURLpart['totaldirs']-($targetLevel+$siteRootSubdirDepth);
	
	for ($i = 0; $i < $totalDirsToTarget; $i++)
		$relPath .= '../';
	
	if ( $appendDirPath )
		$relPath .= $appendDirPath;
		
	if ( $currentLevel == $targetLevel && $appendDirPath )
		$relPath = './';
	
	return $relPath;
}