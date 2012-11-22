
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($coins) ) {
    $coins = (array)$coins;
}
$id = isset($coins['id']) ? $coins['id'] : '';
?>
<div class="admin-box">
    <h3>Coins</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>


        <?php // Change the values in this array to populate your dropdown as required ?>

<?php $options = array(
                '1' => '0,01 €',
                '2' => '0,02 €',
                '3' => '0,05 €',
                '4' => '0,10 €',
                '5' => '0,20 €',
                '6' => '0,50 €',
                '7' => '1,00 €',
                '8' => '2,00 €',
); ?>

        <?php echo form_dropdown('coins_value', $options, set_value('coins_value', isset($coins['coins_value']) ? $coins['coins_value'] : ''), 'Value'. lang('bf_form_label_required'))?>

        <?php // Change the values in this array to populate your dropdown as required ?>

<?php $options = array(
                'de' => lang('de'),
                'at' => lang('at'),
                'be' => lang('be'),
                'cy' => lang('cy'),
                'sk' => lang('sk'),
                'si' => lang('si'),
                'es' => lang('es'),
                'ee' => lang('ee'),
                'fi' => lang('fi'),
                'fr' => lang('fr'),
                'gr' => lang('gr'),
                'ie' => lang('ie'),
                'it' => lang('it'),
                'lu' => lang('lu'),
                'mt' => lang('mt'),
                'nl' => lang('nl'),
                'pt' => lang('pt'),
                'mc' => lang('mc'),
                'sm' => lang('sm'),
                'va' => lang('va'),
); ?>

        <?php echo form_dropdown('coins_country', $options, set_value('coins_country', isset($coins['coins_country']) ? $coins['coins_country'] : ''), 'Country'. lang('bf_form_label_required'))?>        <div class="control-group <?php echo form_error('coins_year') ? 'error' : ''; ?>">
            <?php echo form_label('Year'. lang('bf_form_label_required'), 'coins_year', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="coins_year" type="text" name="coins_year" maxlength="4" value="<?php echo set_value('coins_year', isset($coins['coins_year']) ? $coins['coins_year'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('coins_year'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('coins_title') ? 'error' : ''; ?>">
            <?php echo form_label('Title', 'coins_title', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="coins_title" type="text" name="coins_title" maxlength="50" value="<?php echo set_value('coins_title', isset($coins['coins_title']) ? $coins['coins_title'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('coins_title'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('coins_varient') ? 'error' : ''; ?>">
            <?php echo form_label('Varient', 'coins_varient', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="coins_varient" type="text" name="coins_varient" maxlength="50" value="<?php echo set_value('coins_varient', isset($coins['coins_varient']) ? $coins['coins_varient'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('coins_varient'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('coins_national_side') ? 'error' : ''; ?>">
            <?php echo form_label('Picture National Side', 'coins_national_side', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="coins_national_side" type="text" name="coins_national_side" maxlength="250" value="<?php echo set_value('coins_national_side', isset($coins['coins_national_side']) ? $coins['coins_national_side'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('coins_national_side'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('coins_common_side') ? 'error' : ''; ?>">
            <?php echo form_label('Picture Common Side', 'coins_common_side', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="coins_common_side" type="text" name="coins_common_side" maxlength="250" value="<?php echo set_value('coins_common_side', isset($coins['coins_common_side']) ? $coins['coins_common_side'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('coins_common_side'); ?></span>
        </div>


        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit Coins" />
            or <?php echo anchor(SITE_AREA .'/content/coins', lang('coins_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Coins.Content.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('coins_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('coins_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
