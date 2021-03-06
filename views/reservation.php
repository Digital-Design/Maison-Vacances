
  <link rel="stylesheet" href="css/fullcalendar.min.css">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />

  <br/>
  <br/>

  <!-- agenda -->
  <section class="fond-blanc">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1>Agenda des Réservations</h1>
          <div id="calendar" class="col-md-6 col-md-offset-3" >
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- formulaire de Réservervation -->
  <section id="categorie-contact" class="fond-blanc">
    <h1>Demande de réservation</h1>
    <div class="container-fluid">
      <div class="col-md-6 col-md-offset-3">
        <div id="message_form" class="alert hide" role="alert"></div>
        <form id="form-reservation" action="scripts/form_reservation.php" method="post">
          <div class="form-group">
            <input type="text" id="prenom_nom" name="prenom_nom" class="form-control" placeholder="Prénom Nom" required>
          </div>
          <div class="form-group">
            <input type="email" id="mail" name="mail" class="form-control" placeholder="Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" id="telephone" name="telephone" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="form-control" placeholder="Téléphone" required>
          </div>
          <div class="row">
            <div class='col-md-6'>
              <div class="form-group">
                <div class='input-group date' id='datetimepicker6'>
                  <input type='text' id="date_arrivee" name="date_arrivee" class="form-control" placeholder="Date d'arrivée" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class='col-md-6'>
              <div class="form-group">
                <div class='input-group date' id='datetimepicker7'>
                  <input type='text' id="date_depart" name="date_depart" class="form-control" placeholder="Date de départ" required>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea rows="3" id="message" name="message" class="form-control" placeholder="Message" required></textarea>
          </div>
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="6LdopRgTAAAAAIgK84XyE896565-mHA0M3ivNPc0"></div>
          </div>
          <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="js/moment.min.js"></script>
  <script type="text/javascript" src="js/fullcalendar.min.js"></script>
  <script type="text/javascript" src="js/fullcalendar-fr.js"></script>
  <script type="text/javascript" src="js/gcal.js"></script>
  <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
    //affichage de l'active
    $("a[href^='reservation']").parent().addClass("active");

    //google calendar
    $("#calendar").fullCalendar({
      googleCalendarApiKey: "AIzaSyAzcmUADh2dOxpfUW3XLRcQRmtSJHrA8EE",
      events: {
        googleCalendarId: "el4gjmum3f30jf27oestork48c@group.calendar.google.com"
      },
      eventClick: function(event) {
        if (event.url) {
          return false;
        }
      }
    });

    //datepicker
    $(function () {

      //ajout du addDay pour augmenter la date d'un jour
      Date.prototype.addDays = function(days) {
        var dat = new Date(this.valueOf());
        dat.setDate(dat.getDate() + days);
        return dat;
      };

      //fonction qui ajoute dans un array les dates qui sont dans un intervale de 2 dates
      function disabledDates(events){
        var disabledDatesArray = [];
        $.each(events, function (key, value) {
          var currentDate = new Date(value.start._i);
          while (currentDate < new Date(value.end._i)) {
            disabledDatesArray.push(new Date(currentDate));
            currentDate = currentDate.addDays(1);
          }
        });
        return disabledDatesArray;
      }

      //config des dates pickers
      $('#datetimepicker6').datetimepicker({
        format: 'DD/MM/YYYY',
        minDate: new Date(),
        useCurrent: false
      });
      $('#datetimepicker7').datetimepicker({
        format: 'DD/MM/YYYY',
        minDate: new Date(),
        useCurrent: false
      });

      //à l'ouverture des datepickers on interdit les dates inférieurs à celle actuelle + les dates réservées + celle selectionnée
      $("#datetimepicker6").on("dp.show", function (e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        var disabledDatesArray = disabledDates($('#calendar').fullCalendar('clientEvents'));
        $('#datetimepicker7').data("DateTimePicker").disabledDates(disabledDatesArray);
        $('#datetimepicker6').data("DateTimePicker").disabledDates(disabledDatesArray);
      });
      $("#datetimepicker7").on("dp.change", function (e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        var disabledDates = disabledDates($('#calendar').fullCalendar('clientEvents'));
        $('#datetimepicker7').data("DateTimePicker").disabledDates(disabledDatesArray);
        $('#datetimepicker6').data("DateTimePicker").disabledDates(disabledDatesArray);
      });
    });

    //Form Ajax
    $(document).ready(function() {
      $('#form-reservation').on('submit', function(e) {
        e.preventDefault();
        //Check du form
        if($('#prenom_nom').val() === '' || !isValidEmailAddress($('#mail').val()) || $('#telephone').val() === '' || $('#date_arrivee').val() === '' || $('#date_depart').val() === '' || $('#message').val() === '' || grecaptcha.getResponse().length === 0) {
          $('#message_form').addClass('alert-danger');
          $('#message_form').html('Les champs doivent êtres remplis.');
          $('#message_form').removeClass('hide');
          grecaptcha.reset();
        }
        else{
          //envoi du form
          $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(html, statut){
              $('#message_form').addClass('alert-success');
              $('#message_form').removeClass('alert-danger');
              $('#message_form').html(html);
              $('#message_form').removeClass('hide');
              $('#form-reservation').hide(200);
            },
            error : function(resultat, statut, erreur){
              $('#message_form').addClass('alert-danger');
              $('#message_form').html(resultat.responseText);
              $('#message_form').removeClass('hide');
            }
          });
        }
      });
    });
  </script>
