$('#inputQuarterStart,#inputQuarterEnd,#inputHalfStart,#inputHalfEnd').pickadate({
    selectYears: true,
    selectMonths: true,
    formatSubmit: 'yyyy-mm-dd'
})

$('.sortable').sortable({
  handle: '.handle',
  placeholder: '<li class="media sortable-placeholder"/>'
});