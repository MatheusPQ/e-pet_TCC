$(document).ready(function(){
    $('#calendar').fullCalendar({
        defaultView: 'listDay',
        events: [
          {
            title  : 'BANHO | YORKSHIRE | R$ 15,00',
            start  : '2018-04-18T15:30:00',
            allDay : false 
          },
          {
            title  : 'BANHO | PINSCHER | R$ 15,00',
            start  : '2018-04-18T12:30:00',
            allDay : false 
          },
          {
            title  : 'TOSA | PITBULL | R$ 15,00',
            start  : '2018-04-18T12:00:00',
            allDay : false 
          }
        ]
      });
});