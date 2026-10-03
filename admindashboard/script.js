$(function () {
  var $sidebar = $('#sidebar');

  $('#menuButton').on('click', function () {
    $sidebar.toggleClass('show');
  });

  $('.side-menu a').on('click', function (event) {
    event.preventDefault();
    $('.side-menu a').removeClass('active');
    $(this).addClass('active');
  });

  $('.period-switch button').on('click', function () {
    $('.period-switch button').removeClass('active');
    $(this).addClass('active');
  });

  $('#refreshButton').on('click', function () {
    var $button = $(this);
    $button.prop('disabled', true).html('<span>...</span> Updating');
    $('.revenue-line, .revenue-area, .year-before').addClass('is-loading');

    setTimeout(function () {
      $button.prop('disabled', false).html('<span>&#8635;</span>Refresh data');
      $('.revenue-line, .revenue-area, .year-before').removeClass('is-loading');
    }, 700);
  });

  // Draw sparkline mini-charts inside stat cards
  $('.sparkline').each(function () {
    var values = $(this).data('values').toString().split(',');
    $(this).sparkline(values, {
      type: 'line',
      width: '70px',
      height: '20px',
      lineColor: 'blue',
      fillColor: false,
      spotColor: false
    });
  });
});