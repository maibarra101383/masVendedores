<div  style="width:470px; height:270px; margin:0 auto; border-radius:5px; border:1px solid #909090; padding:20px align='center'"; class="login" >
<?php

echo'<div class="login">';
    
    echo form_open();
        
    echo'<table width="300" height="200" class="login">';
    echo'<tr>';
    echo '<br>';
		  echo '<td width=20% valing="top">';
	 		 echo form_label('Cliente: ');		
		  echo '<td>';
		   $data = array(
		 		'name'  => 'cliente',
		 		'id'    => 'cliente',
		 		'value' => set_value('cliente'),
		 		'style' => 'width:150px'
		 	);
			echo form_input($data);
		 	echo '<input type="hidden" name="clienteId" id="clienteId"/>';
		 	echo '</td>';
		 	echo '</td>';
    echo '</tr>';

	echo '<tr>';
	    echo '<td width=20% valing="top">';
			 echo form_label('Fecha y Hora:');
			echo '<td>';
   		$data=array(
					'name' =>'fecha' ,
					'id'   =>'fecha' ,
					'value'=>set_value('fecha'),
					'style'=>'width:150px'
					);
		
			 echo form_input($data);
		echo '<input type="hidden" name="fecha_alt" id="fecha_alt"/>';
  		echo '</td>';
		  echo '</td>'; 
      echo '</tr>';	

		echo '<td width=20% valing="top">';
			echo form_label('Motivo:');
		echo '<td>';
          echo '<select name="motivo">';
          echo '<option value"null">Selecione un motivo</option>';
          echo '<option value="Presentacion">Presentacion</option>';
          echo '<option value="Propuesta">Propuesta</option>';
          echo '<option value="Propuesta2">Propuesta 2</option>';
          echo '<option value="firma_contrato">Firma de contrato</option>';
          echo '<option value="seguimiento_informacion">Seguimiento a informacion</option>';
          echo '<option value="Presentar_avance">Presentar Avances</option>';
          echo '<option value="Presentar_proyecto_final">Presentar proyecto final</option>';
          echo '</select>';  
    echo '</td>';
    echo '</td>';
    echo '</tr>';

    echo '<td width=20% valign="top">';
    echo form_label('Anotaciones:');
    echo '</td>';
    echo'<td>';
      $data = array(
        'name'  => 'anotacion',
        'id'    => 'anotacion',
        'value' => set_value('anotacion'),
        'style' => 'width:200px;height:50px'
      );
   echo form_textarea($data);
   echo'</td>';

  echo'</table>'; 

		 	$data = array(
		 		'name'  => 'agendar',
		 		'id'    => 'agendar',
		 		'class' => 'abutton_cancel',
		 		'value' => 'Agendar'
		 	);

		 	echo form_submit($data);	
  ?>
		 <a href="<?=base_url('clientes/')?>" class ="abutton_cancel" >Cancelar</a>
	</div>
  </div>
  </form>
  

<script>

base_url = "<?= base_url(); ?>";

$(function () {
	
	      $( "#cliente" ).autocomplete({
      	source: base_url + "clientes/lista",
      	minLength: 1,
      		select: function( event, item ) {
      		},
       		change: function(event, ui) {
            $("#clienteId").val(ui.item ? ui.item.Id : "");
        	}
    	});

    fecha_ahora = "<?= date('D M d Y H:i:s O'); ?>";
		fecha_ahora = new Date(fecha_ahora);

    	var myControl=  {
	create: function(tp_inst, obj, unit, val, min, max, step){
		$('<input class="ui-timepicker-input" value="'+val+'" style="width:50%">')
			.appendTo(obj)
			.spinner({
				min: min,
				max: max,
				step: step,
				change: function(e,ui){ // key events
						// don't call if api was used and not key press
						if(e.originalEvent !== undefined)
							tp_inst._onTimeChange();
						tp_inst._onSelectHandler();
					},
				spin: function(e,ui){ // spin events
						tp_inst.control.value(tp_inst, obj, unit, ui.value);
						tp_inst._onTimeChange();
						tp_inst._onSelectHandler();
					}
			});
		return obj;
	},
	options: function(tp_inst, obj, unit, opts, val){
		if(typeof(opts) == 'string' && val !== undefined)
			return obj.find('.ui-timepicker-input').spinner(opts, val);
		return obj.find('.ui-timepicker-input').spinner(opts);
	},
	value: function(tp_inst, obj, unit, val){
		if(val !== undefined)
			return obj.find('.ui-timepicker-input').spinner('value', val);
		return obj.find('.ui-timepicker-input').spinner('value');
	}
};

$('#fecha').datetimepicker({
	controlType: myControl,
	altField: "#fecha_alt",
	altFieldTimeOnly: false,
	altFormat: "yy-mm-dd",
	altTimeFormat: "HH:mm",
	minDate: fecha_ahora,
	timeText:    '',
	hourText:    'Hora',
	minuteText:  'Minuto',
	currentText: 'Fecha actual',
	closeText:   'Aceptar',
});


});	


function autocom(select){

  var accentMap = {
    "á": "a",
      "é": "e",
      "í": "i",
      "ó": "o",
      "ú": "u"
    };

  var normalize = function( term ) {
      var ret = "";
      for ( var i = 0; i < term.length; i++ ) {
        ret += accentMap[ term.charAt(i) ] || term.charAt(i);
      }
      return ret;
    };

    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
       this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton(select);
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .attr( "id", select+"_id" )
          .attr( "name", select+"_name" )
          .attr( "value", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left auto-input "+select+"_input" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            tooltipClass: "ui-state-highlight"
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
            $( "#"+select ).change();
          },
 
          autocompletechange: function (event, ui) { 
            this._removeIfInvalid(event, ui); 
            //$( "#estado" ).change();
          }
        });
      },
 
      _createShowAllButton: function(select) {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )

          .attr( "tabIndex", -1 )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right auto-button "+select+"_input" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .click(function() {
            input.focus();
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(normalize( text )) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {

        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " no coincide con ninguna opción" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.data( "ui-autocomplete" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
  }

</script>