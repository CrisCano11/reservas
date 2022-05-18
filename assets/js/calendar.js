const controller = "Cinicio";
const styles = [
  "#7448c2",
  "#21c0d7",
  "#d99e2b",
  "#cd3a81",
  "#9c99cc",
  "#e14eca",
  "#3f3fbf80",
  "#3fbf7f",
  "#70f793",
  "#25dede",
  "#450c07",
  "#cf2515",
  "#8215cf",
  "#15cf25",
  "#cf15c0",
];

/* initialize the calendar
     -----------------------------------------------------------------*/
//Date for the calendar events (dummy data)
var date = new Date();
var d = date.getDate(),
  m = date.getMonth(),
  y = date.getFullYear();

var Calendar = FullCalendar.Calendar;
var calendarEl = document.getElementById("calendar");

// initialize the external events
// -----------------------------------------------------------------

var calendar = new Calendar(calendarEl, {
  hiddenDays: [0, 6],
  locale: "es",
  headerToolbar: {
    left: "prev,next today",
    center: "title",
    right: "dayGridMonth,timeGridWeek,timeGridDay",
  },
  themeSystem: "bootstrap",
  editable: true,
  droppable: true, // this allows things to be dropped onto the calendar !!!
});

calendar.render();
getReservas();

function getReservas() {
  let data = {};

  $.ajax({
    url: base_url() + controller + "/getReservas",
    type: "POST",
    async: false,
    success: function (resultado) {
      data = JSON.parse(resultado);
      try {
        if (data.length > 0) {
          $.each(data, function (index, value) {
            calendar.addEventSource({
              events: [
                {
                  title: value.motivo,
                  start: value.fecha + "T" + value.hora_inicial,
                  end: value.fecha + "T" + value.hora_final,
                  allDay: false,
                  backgroundColor:
                    styles[Math.floor(Math.random() * styles.length)],
                },
              ],
            });
          });
        }
      } catch (error) {
        alertify.error(error);
        console.log(error);
      }
    },
    error: function (error) {},
  });
}
