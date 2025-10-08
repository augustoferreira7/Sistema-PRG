document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        initialView: 'dayGridMonth', headerToolbar:{
            start: 'prev, next, today', center: 'title', end: 'dayGridMonth, timeGridWeek, timeGridDay, list'
        },
        editable: true,
        eventLimit: 3,
        dayMaxEvents: 3,
        slotDuration: '01:00:00',
        slotMinTime: '08:00:00',
        slotMaxTime: '18:00:00',

        dateClick: function(info){
            if(info.view.type == 'dayGridMonth' || info.view.type == 'timeGridWeek'){
                calendar.changeView('timeGrid', info.dateStr);
            }
        },

        //event: '',

        eventClick: function(info){
            info.jsEvent.preventDefault();
            alert("teste");
        },

        selectable: true,
        select: function(info){
            if(info.view.type == 'timeGrid'){
                alert("Início do Evento: " + info.start.toLocaleString());
            }
            
        }
        });
        calendar.render();
      });