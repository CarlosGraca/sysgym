$(function () {



    var AppStopwatch = (function () {
        var counter = 0,
            $stopwatch = {
                el: document.getElementById('stopwatch'),
                container: document.getElementById('time-container'),
                startControl: document.getElementById('stopwatch'),
                stopControl: document.getElementById('stopwatch')
            };

        var runClock;

        function displayTime() {
            $stopwatch.container.innerHTML = moment().hour(0).minute(0).second(counter++).format('HH : mm : ss');
        }

        function startWatch() {
            runClock = setInterval(displayTime, 1000);
        }

        function stopWatch() {
            clearInterval(runClock);
        }

        return {
            startClock: startWatch,
            stopClock: stopWatch,
            $start: $stopwatch.startControl,
            $stop: $stopwatch.stopControl
        };
    })();

    var _stopwatch_status = 0;

    $(document).on('click','#stopwatch',function () {
        if(_stopwatch_status == 0){
            AppStopwatch.startClock();
            _stopwatch_status = 1;
        }else{
            AppStopwatch.stopClock();
            _stopwatch_status = 0;
        }

    });

});

