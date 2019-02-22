<?php if( $page['contentType'] == 'html' ){ ?>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo ROOT_PATH; ?>assets/datatables-editor/js/dataTables.editor.min.js"></script>
<!--<script type="text/javascript" language="javascript" src="<?php echo ROOT_PATH; ?>assets/datatables-editor/js/shCore.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo ROOT_PATH; ?>assets/datatables-editor/js/demo.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo ROOT_PATH; ?>assets/datatables-editor/js/editor-demo.js"></script>-->

<script type="text/javascript" language="javascript" class="init">
<?php } ?>
var editor; // use a global for the submit and return data rendering in the examples
<?php
// avoid "parameter n to be array" error
foreach( array( 'hideInColumn','showInColumn' ) as $opt )
	if( !is_array( $sqlDB[$opt] ) )	
		$sqlDB[$opt] = array();
	
foreach( $data as $class => $src ){
	if( $class == 'option' ) continue;
	
	$optDefaults = array( 
		'buttonsHide' => array(),
		'editTitle' => 'Edit this item',
		'editLabel' => 'Edit'
	);
	
	$opt = is_array( $data['option'][$class] ) ? array_merge( $optDefaults,$data['option'][$class] ) : $optDefaults;

	// for endscript
	$tablename = $src;
	
	// ajax source is defined in .htaccess to use jsonize.json.php?pagename=$src
	$dataFile = __DIR__. '/../../'. $user['role'].'/data/'.$src.'.php';
	include( $dataFile );
?>
$(document).ready(function(){
	editor = new $.fn.dataTable.Editor( {
		ajax: "<?php echo $page['apiPath'] . $src; ?>.json?edit",
		table: ".<?php echo $class; ?>",
		fields: [
<?php 
	if( ( $colCount = count( $fields ) ) > 0 )
		foreach( $fields as $colKey => $col ){ ?>
			{
<?php if( $col == 'id' ){ ?>
				type: "hidden",
<?php } else {  ?>
				label: "<?= labelize( $col ) ?>:",
<?php } ?>
				name: "<?= $col ?>"
			}<?php if ( $i++ < $colCount-1 ) echo ','; ?>
<?php } ?>
		]
	} );
	$('.<?php echo $class; ?>').DataTable( {
		dom: "Bfrtip",
		ajax: "<?php echo $page['apiPath'] . $src; ?>.json?edit",
		columns: [
<?php
unset( $i );
if( ( $colCount = count( $fields ) ) > 0 )
	foreach( $fields as $colKey => $col ){
		// $sqlDB['showInColumn'] forces the normally excluded column eg.'id' to be displayed
		// $sqlDB['hideInColumn'] hides the values but creates the column
		if( $col != 'id' || in_array( $col,$sqlDB['showInColumn'] ) ){
			/**/
			?>
			{ data: <?php if ( $i++ < $colCount-1 ){ 
				?>"<?= $col ?>" }<?php echo ','."\n";
			} else { ?>null, render: function( data, type, row ){
        return <?php 
					if( !in_array( $col,$sqlDB['hideInColumn'] ) ){
						?>data.<?= $col ?>+<?php } 
					?>'<a id="<?= $src ?>-btn-'+data.id+'" class="btn edit" title="<?= $opt['editTitle'] ?>" <?php
					if( $opt['editModal'] ){
						?>data-toggle="modal" data-target="#modal" data-id="'+data.id+'" <?php } 
					?>href="<?= $opt['editPage'] ?>?id='+data.id+'"><?= $opt['editLabel'] ?><?php if( $opt['editLabelAppend'] == '+' ){ 
					?>'+(1+Math.floor(Math.random() * 6))+'<?php } 
					?></a>';
				}
      }
			<?php }
		}
	}

$tx['removeLabel'] = $sqlSET['remove'] == "active=TRUE" ? 'Activate' : 'Archive';
?>
		],
		select: true,
		buttons: [
<?php if( !in_array( 'edit',$opt['buttonsHide'] ) ){ ?>
			{ extend: "edit",editor: editor },
<?php } ?>
<?php if( !in_array( 'remove',$opt['buttonsHide'] ) ){ ?>
			{ extend: "remove",text:"<?= $tx['removeLabel'] ?>",editor: editor },
<?php } ?>
			{
				extend: 'collection',
				text: 'Export',
				buttons: [
						'copy',
						'excel',
						'csv',
						'pdf',
						'print'
				]
			}
		]
	} );
} );
<?php } ?>

<?php if( $page['contentType'] == 'html' ){ ?>
</script>
<?php } ?>