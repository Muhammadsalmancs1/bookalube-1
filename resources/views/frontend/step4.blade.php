@extends('layouts.frontend.app')

@section('template_title')
    Book a Lube
@endsection

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-2 page-info-div order-lg-1 order-2">
                <div class="page-info">
                    <p class="mb-0 pb-0">Vehicle</p>
                    <h3 class="mb-0 pb-0">Betsey</h3>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 mx-auto order-lg-2 order-1 mb-lg-3">
                <div class="accordian-head">
                    <div class="form-number"><span>4</span>/6</div>
                    <h2 class="main-heading text-white text-center  mb-0 pb-0">
                        Book a Time
                    </h2>
                    <a href="home.html" class="text-decoration-none text-white">Home
                        <img src="assets/images/ar.svg" alt="" />
                    </a>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 mx-auto order-lg-3 order-3">
                <div class="container">
                    <!-- <div class="blushed-card  mb-5" style="border-radius: 4px;
                          border: 0px solid var(--fill-dark-dark-5, #EBEAED);
                          background: var(--fill-white-white, #FFF);">
                              <div class="table-responsive">
                                  <div id='calendar' class="dashboard-table-lg"></div>
                              </div>
                          </div> -->
                    <div class="row d-flex mt-2">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table date-table">
                                    <thead>
                                    <tr>
                                        <th class="today-date" >
                                            <p  class="text-cneter">Monday - Nov 15</p>
                                        </th>
                                        <th >
                                            <h3 class="table-head">Bay 1</h3>
                                        </th>
                                        <th >
                                            <h3 class="table-head">Bay 2</h3>
                                        </th>
                                        <th >
                                            <h3 class="table-head">Bay 3</h3>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="">
                                        <td  class="text-end time-text " >9am - 10am</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>

                                    </tr>
                                    <tr class="">
                                        <td  class="text-end time-text" style="width: fit-content !important;">10am - 11pm</td>
                                        <td class="text-center seats-status "><div class="seat-available seat-selected">Booked</div></td>
                                        <td class="text-center seats-status "><div class="seat-available">Available</div></td>
                                        <td class="text-center seats-status "><div class="seat-available">Available</div></td>
                                    </tr>
                                    <tr class="">
                                        <td  class="text-end time-text" style="width: fit-content !important;">11am - 9pm</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                    </tr>
                                    <tr class="">
                                        <td  class="text-end time-text" style="width: fit-content !important;">12pm - 11pm</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                    </tr>
                                    <tr class="">
                                        <td  class="text-end time-text" style="width: fit-content !important;">1pm - 5pm</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                    </tr>
                                    <tr class="">
                                        <td  class="text-end time-text" style="width: fit-content !important;">2pm - 11am</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                    </tr>
                                    <tr class="">
                                        <td  class="text-end time-text" style="width: fit-content !important;">3pm - 7pm</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                    </tr>
                                    <tr class="">
                                        <td  class="text-end time-text" style="width: fit-content !important;">4pm - 5pm</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                    </tr>
                                    <tr class="">
                                        <td  class="text-end time-text" style="width: fit-content !important;">5pm - 6pm</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                    </tr>
                                    <tr class="">
                                        <td  class="text-end time-text" style="width: fit-content !important;" >6pm - 8pm</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                    </tr>
                                    <tr class="">
                                        <td  class="text-end time-text" style="width: fit-content !important;">7pm - 11am</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                        <td class="text-center seats-status">Filled</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center my-5 justify-content-center mx-auto flex-md-row flex-column">
                    <div class="me-md-2 me-0  btn-div order-md-1 order-2">
                        <a href="step3.html" class="main-btn-blank">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.29289 11.2929C7.90237 11.6834 7.90237 12.3166 8.29289 12.7071L13.2929 17.7071C13.6834 18.0976 14.3166 18.0976 14.7071 17.7071C15.0976 17.3166 15.0976 16.6834 14.7071 16.2929L10.4142 12L14.7071 7.70711C15.0976 7.31658 15.0976 6.68342 14.7071 6.29289C14.3166 5.90237 13.6834 5.90237 13.2929 6.29289L8.29289 11.2929Z" />
                            </svg>

                            Back
                        </a>
                    </div>
                    <div class="btn-div order-md-2 order-1 mb-md-0 mb-3">
                        <a href="step5.html" class="main-btn2">Submit & Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
    integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
  <!-- <script src="assets/js/calendar.js"></script>
    <script src="https://fullcalendar.io/releases/fullcalendar/3.10.0/lib/moment.min.js"></script>
    <script src="https://fullcalendar.io/releases/fullcalendar/3.10.0/lib/jquery.min.js"></script>

    <script src="https://fullcalendar.io/releases/fullcalendar/3.10.0/fullcalendar.min.js"></script> -->

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var calendarEl = document.getElementById("calendar");
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "timeGridWeek",
        headerToolbar: {
          center: "title",
          left: "",
          right: "dayGridMonth,timeGridWeek,timeGridDay today",
        },
        titleFormat: {
          year: "numeric",
          month: "long",
        },
        views: {
          timeGridWeek: {
            dayHeaderFormat: { weekday: "short", day: "numeric" },
            allDaySlot: false,
          },
        },
        eventDidMount: function (info) {
          // 'info.el' is the DOM element for the event
          var eventEl = info.el;
          var eventTitle = info.event.title;
          var eventStart = info.event.startStr; // Start time in ISO format
          var eventEnd = info.event.endStr; // End time in ISO format
          var eventCategory = info.event.extendedProps.category; // Replace with your event category
          var eventBorderColor = info.event.borderColor;
          var eventColor = info.event.backgroundColor;

          eventEl.closest(
            ".fc-timegrid-event-harness"
          ).style.backgroundColor = eventColor;

          // Create HTML content
          var htmlContent = `
        <div class="event-border"></div>
        <div class="event-details">
          <div class="event-title">
            <strong>${eventTitle}</strong>
          </div>
        </div>
      `;

          // Set the innerHTML of the event element to display HTML content
          eventEl.innerHTML = htmlContent;

          eventEl.querySelector(".event-border").style.backgroundColor =
            eventBorderColor;

          if (eventTitle == "Available") {
            eventEl.querySelector("strong").classList.add("available-seat");
          }
        },
        events: [
          {
            title: "Filled",
            start: "2023-11-26T07:00:00", // Start date and time in ISO format
            end: "2023-11-26T07:00:00", // End date and time in ISO format
            backgroundColor: "transparent",
            borderColor: "#20C9AC",
            //   category: "Accounting",
          },
          {
            title: "Filled",
            start: "2023-11-27T07:00:00", // Start date and time in ISO format
            end: "2023-11-27T07:00:00", // End date and time in ISO format
            backgroundColor: "transparent",
            borderColor: "#20C9AC",
            //   category: "Accounting",
          },
          {
            title: "Filled",
            start: "2023-11-28T07:00:00", // Start date and time in ISO format
            end: "2023-11-28T07:00:00", // End date and time in ISO format
            backgroundColor: "transparent",
            //   borderColor: "#20C9AC",
            //   category: "Accounting",
          },
          {
            className: "available-seat",
            title: "Available",
            start: "2023-11-29T09:00:00", // Start date and time in ISO format
            end: "2023-11-29T09:00:00", // End date and time in ISO format
            backgroundColor: "transparent",
            //   borderColor: "#20C9AC",
            //   category: "Accounting",
          },
          {
            title: "Available",
            start: "2023-12-20T10:00:00", // Start date and time in ISO format
            end: "2023-12-20T12:00:00", // End date and time in ISO format
            backgroundColor: "transparent",
            //   borderColor: "#20C9AC",
            //   category: "Accounting",
          },
          {
            title: "Available",
            start: "2023-11-17T10:00:00",
            end: "2023-11-17T11:30:00",
            backgroundColor: "transparent",
            //   borderColor: "#FFA043",
            //   category: "Finance",
          },
          {
            title: "Review data from Q1",
            start: "2023-11-18T06:00:00",
            end: "2023-11-18T08:30:00",
            backgroundColor: "transparent",
            //   borderColor: "#5542F6",
            //   category: "Marketing",
          },
          {
            title: "Available",
            start: "2023-11-17T01:00:00",
            end: "2023-11-17T03:30:00",
            backgroundColor: "transparent",
            //   borderColor: "#20C9AC",
            //   category: "IT Support",
          },
          // Add more Availablebjects as needed
        ],
      });
      calendar.render();
    });
    // $('body').on('click','.event-title',function(){
    //  $(this).closest.$('.calendar-overlay').css('display','flex');
    // })

    // // Add click event handler to all .event-title elements
    // $('body').on('click','.event-title',function() {
    // // Find the closest .event-details parent element
    //     $('.event-title').closest('.calendar-overlay').css('display','flex');

    // });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Your existing code...

      // Add event listener to seats-status elements
      document.querySelectorAll('.seat-available').forEach(function(seat) {
        seat.addEventListener('click', function() {
          // Toggle the class .seat-selected on the clicked element
          this.classList.toggle('seat-selected');
          this.textContent = this.classList.contains('seat-selected') ? 'Booked' : 'Available';

        });
      });

      // Your existing code...
    });
  </script>

@endsection
