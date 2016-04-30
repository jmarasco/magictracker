$.doDisney = {
  init: function () {
    // Button functions

    //Check list item
    $('.btn-check-unchecked').click(function() {
      console.log('check');
      var $listItem = $(this).closest('.list-item');
      $listItem.addClass('checked').removeClass('unchecked');
    });

    //Uncheck list item
    $('.btn-check-checked').click(function() {
      console.log("uncheck");
      var $listItem = $(this).closest('.list-item');
      $listItem.addClass('unchecked').removeClass('checked');
    });

    //Toggle list item on To Do list
    $('.btn-to-do').click(function() {
      console.log('toDoAdd');
      $(this).toggleClass('to-do');
    });

    //Add check
    $('.btn-counter').click(function() {
      console.log('addCheck');
      var count = $(this).find('.check-count');
      var newCount = (parseInt(count.text())+1);
      count.text(newCount);
    });

    //List filters ***REPLACE WITH PHP***
    $('#listFilterChecked a').bind('click', function() {
      var thisFilter = $(this).text();
      $('#item-list li.list-item').hide();
      $('#item-list li.checked:hidden').show();
      $('.list-filter .filter-name').text(thisFilter);
    });

    $('#listFilterUnchecked a').bind('click', function() {
      var thisFilter = $(this).text();
      $('#item-list li.list-item').hide();
      $('#item-list li.unchecked:hidden').show();
      $('.list-filter .filter-name').text(thisFilter);
    });

    $('#listFilterAll a').bind('click', function() {
      var thisFilter = $(this).text();
      $('#item-list li:hidden').show();
      $('.list-filter .filter-name').text(thisFilter);
    });

    // Animate progress bars
      $('.progress-animate').each(function() {
        var e = $(this);
        var totalChecks = e.find('.total-checks').text();
        var totalAll = e.find('.total-all').text();
        var percent = (totalChecks / totalAll);
        e.find('.progress-bar').animate({width: (percent*100)+'%'}, 2500).html(Math.ceil((percent*100)) + "%");
      });
  } //Init
}; //doDisney object

$(document).ready(function() {$.doDisney.init()});