
<!-- Modal -->
<div class="modal fade" id="modal_credit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Кредитний калькулятор</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <?=common\widgets\CreditWidget::widget(['cars'=>$model])?>
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        <button type="button" class="btn btn-primary">Відправити заявку</button>
      </div>-->
    </div>
  </div>
</div>

