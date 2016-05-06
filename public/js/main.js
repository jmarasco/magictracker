$.magicTracker = {
  init: function () {
    // Button functions

    //Check list item
    $('.btn-check-unchecked').click(function() {
      var e = $(this);
      var $listItem = e.closest('.list-item');
      var $id = $listItem.data('id');
      var $checkType = $listItem.hasClass('unchecked') ? 'check' : 'uncheck';
      $listItem.addClass('pending');
      $.ajax({
        url: '/itemactions/check',
        type: 'POST',
        data: {
          validationToken: $listItem.find('input[name=_token]').val(),
          itemId: $id,
          checkType: $checkType
        },
        success: function() {
          $listItem.toggleClass('checked');
          $listItem.toggleClass('unchecked');
          $listItem.removeClass('pending');
          $.magicTracker.animateProgressBars();
        }
      });
      return false;
    });

    //Uncheck list item
    $('.btn-check-checked').click(function() {
      var $listItem = $(this).closest('.list-item');
      $listItem.addClass('unchecked').removeClass('checked');
    });

    //Toggle list item on To Do list
    $('.btn-to-do').click(function() {
      $(this).toggleClass('to-do');
    });

    //Add check
    $('.btn-counter').click(function() {
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

    $.magicTracker.animateProgressBars();
  }, //Init

  // Animate progress bars
  animateProgressBars: function () {
    $('.progress-animate').each( function () {
      var e = $(this);
      var totalChecks = e.find('.total-checks').text();
      var totalAll = e.find('.total-all').text();
      var percent = (totalChecks / totalAll);
      e.find('.progress-bar').animate({width: (percent*100)+'%'}, 1500).html(Math.ceil((percent*100)) + "%");
    });
  }
}; //magicTracker object

$(document).ready(function() {$.magicTracker.init();});