<?php
// returns error in HTML
function errorsAndHelpHTML( $format = 'php' ){
	global $page;

	$html = '';
	
	if($page['help'] || $page['errors'] )
		$html = '<div class="help">';
	
	if($page['help'])
		foreach( $page['help'] as $helpMessage )
			$html .= '<p><span class="help-block good">' . $helpMessage .'</span></p>';
	if($page['errors'])
		foreach( $page['errors'] as $errorMessage )
			$html .= '<p><span class="help-block">ERROR: </span>' . $errorMessage .'</p>';
	
	if($page['help'] || $page['errors'] )
		$html .= '</div>';
	
	/*if( $format == 'js' )
		$html = esc_js( $html );*/
	
	return addslashes( $html );
}

/**
 * creates a data table
 *
 * @param array $columnTitles  	Column header texts.
 * @param string $name    			For <table class="table-$name">.
 * @return string								HTML code
 */
function tabularize( $columnTitles = array( 'Column A','Column B','Column C' ),$name = 'of-data' ){
?>
<table class="table table-striped table-bordered table-<?= $name ?>">
  <thead>
    <tr>
<?php	foreach( $columnTitles as $title ){?>
			<th><?= $title ?></th>
<?php } ?>
    </tr>
  </thead>
  <tfoot>
    <tr>
<?php	foreach( $columnTitles as $title ){?>
			<th><?= $title ?></th>
<?php } ?>
    </tr>
  </tfoot>
</table>
<?php
}

// see if nav item is "active"
function isNavItemActive($thisPagename = ''){
	global $page;
	
	if($thisPagename == $page['baseName'])
		return true;
}

// generates a navigation menu based on $nav array hierarchy
function navigate($nav = array()){
	global $page;

	// find active parent
	foreach( $nav as $key => $navi ){
		if( isNavItemActive( basename($navi['link']) ) )
			$activeParentName = basename($navi['link']);
		
		if( $navi['subnav'] )
			foreach( $navi['subnav'] as $subnavi ){
				if( isNavItemActive(basename($subnavi['link'])) ){
					$openParentName = basename($navi['link']);
				}
			}
	}
		
?>
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
<?php
	foreach( $nav as $item ){
?>
	<li class="nav-item<?php if( basename($item['link']) == $activeParentName ) echo '  active';if( basename($item['link']) == $openParentName ) echo ' open'; ?>">
		<a href="<?php echo ( $item['subnav'] ? '#' : $item['link'].'.html' ); ?>"><i class="<?php echo $item['icon']; ?>"></i><span class="menu-title"><?php echo $item['title']; ?></span></a>
<?php
		if( $item['subnav'] ){
?>
		<ul class="menu-content">
<?php
			foreach( $item['subnav'] as $subitem ){
?>
			<li class="<?php if( basename($subitem['link'] ) == $page['baseName'] ) echo 'active'; ?>"><a class="menu-item" href="<?php echo $subitem['link']; ?>.html"><?php echo $subitem['title']; ?></a></li>
<?php
			}
?>
		</ul>
<?php
		}
?>
	</li>
<?php
	}
}

// outputs list of items into a checkmark list
function checkmarkize($list = array()){
	$n = 1;
	foreach( $list as $label ){
?>
<fieldset>
	<input type="checkbox" id="input-<?php echo $n; ?>">
	<label for="input-<?php echo $n; ?>"><?php echo $label; ?></label>
</fieldset>
<?php
		$n++;
	}
}

/*
 * Glues string like to a class="name boltIn"
 */
function boltIn( $string = '',$bolt = ' ',$beforeORafter='before' ){
	switch( $beforeORafter ){
		case 'before' :
			$prepend = $bolt;
			break;
		case 'after' :
			$append = $bolt;
			break;
		case 'both' :
			$append = $append = $bolt;
	}
	
	if( $string )
		return $prepend.$string.$append;
}

/* wraps content into a widget
 * Please pass your data into the widget content through $values to
 * avoid declaring global variables. 
 */
function widgetize($title = 'Untitled',$contentFile = '',$values = array()){
	global $user,$pagename,$page,
	// Jerome's
	$list;

	// widget options
	$widget = array( 
		'cssID' => '',
		'widgetType' => '', // modbox, form-repeater
		'buttonsHide' => 0/*,
		'content' => 0*/ // loading
	);

	//print_r( $_POST );exit();
	$fv = $values;
	if( count( $fv ) == 0 )
		// abbreviate the values var to $fv
		$fv = $_POST;
?>
<section id="<?= $fv['cssID'] ?>" class="card box-shadow-2 icheck-checkbox">
	<div class="card-header">
		<h4 class="card-title"><?php echo $title; ?></h4>
		<div class="heading-elements">
			<?php if( !$fv['buttonsHide'] ){ ?>
			<ul class="list-inline mb-0">
				<?php if( $fv['widgetType'] != 'form-repeater' ){ ?>
				<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
				<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
				<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
				<?php } ?>
				<li><a data-action="close"<?php if( $fv['widgetType'] == 'form-repeater' ) echo ' data-repeater-delete'; ?>><i class="ft-x"></i></a></li>	
			</ul>
			<?php } ?>
			<?php if( $fv['widgetType'] == 'modbox' ){ ?>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<?php } ?>
		</div>
	</div>
	<div class="card-content">
		<div class="card-body<?= boltIn( $fv['widgetType'] ); ?>" id="">
<?php 
if( $contentFile == 'loading' ){ ?>
	<p>loading ...</p>
	
<?php 
} else {
	$contentFile = __DIR__. '/../'. $user['role']. '/content/' .$contentFile;
	
	if( file_exists($contentFile) ){
		// This is backed by a matcing group id at the server side
		// Necessary for added/deleted comparison
		if( ( $fv['widgetType'] == 'form-repeater' ) && $fv['id'] ){ ?>
				<input type="hidden" name="id" value="<?= $fv['id'] ?>" />
		<?php }
		include( $contentFile );
	}
	// temporary, for demo mode
	else {
		$contentFile = __DIR__. '/../common/content/coming-soon.html';
		include( $contentFile );
	}

	if(!file_exists($contentFile)){ ?>
		<p><span class="help-block">ERROR: </span>Widget content file <strong><?php echo $contentFile; ?></strong> does not exist.<br>Create a nice little widget file to load here.</p>
<?php }
} ?>
		</div>
	</div>
</section>
<?php
}