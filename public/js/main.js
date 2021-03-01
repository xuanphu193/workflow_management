$(document).ready(function() {
    $('#example').DataTable();

    var initialLocaleCode = 'en';
    var calendarEl = $('#calendar');
    var initialDate = Date.now();
    console.log(calendarEl.length);
    // return false;
    if (calendarEl.length > 0) {
        var calendar = new FullCalendar.Calendar(calendarEl[0], {
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialDate: initialDate,
            locale: initialLocaleCode,
            buttonIcons: false,
            weekNumbers: true,
            editable: true,
            events: '/api/work/get_data'
          });
      
          calendar.render();
    }
    
} );