window.onload = function(){
    var date = document.getElementById("date").value;
    console.log(date);
    //status: isPresent = 1 isAbsent = 0
    document.getElementById("isPresent").value = 1;
    document.getElementById("isAbsent").value = 0;

    //----------------start of time in------------------------------------------
    var employeetimestart = document.getElementById("txt_schedstart").value;
    var employeetimeend = document.getElementById("txt_schedend").value;

    //the current time
    var d1 = new Date();
    var options = {
    hour: 'numeric',
    minute: 'numeric',
    second: 'numeric',
    hour12: false
    };
    var currentTime = d1.toLocaleTimeString('en-US', options);
    console.log("Current Time: ", currentTime);
    if(document.getElementById("timein").value == ""){
        document.getElementById("timein").value = currentTime;
    }
    
    document.getElementById("timeout").value = currentTime;

    //grace period is added in time in
    var in_employeetimeParts = employeetimestart.split(':');
    var in_addedMinutes = 10; 
    var in_newMinutes = parseInt(in_employeetimeParts[1]) + in_addedMinutes;
    var in_newHours = parseInt(in_employeetimeParts[0]) + Math.floor(in_newMinutes / 60);
    in_newMinutes = in_newMinutes % 60;
    var in_newTime = in_newHours.toString().padStart(2, '0') + ':' + in_newMinutes.toString().padStart(2, '0') + ':' + in_employeetimeParts[2];

     //grace period is added in timeout
     var out_employeetimeParts = employeetimeend.split(':');
     var out_addedMinutes = 10; 
     var out_newMinutes = parseInt(out_employeetimeParts[1]) + out_addedMinutes;
     var out_newHours = parseInt(out_employeetimeParts[0]) + Math.floor(out_newMinutes / 60);
     out_newMinutes = out_newMinutes % 60;
     var out_newTime = out_newHours.toString().padStart(2, '0') + ':' + out_newMinutes.toString().padStart(2, '0') + ':' + out_employeetimeParts[2];

    console.log('Consider as Late if Logged in After: ', in_newTime);
    console.log('Consider as Undertime if Logged out Before: ', employeetimeend);
    console.log('Consider as Overtime if Logged out After: ', out_newTime);

    //determine whether late or on-time
    if ( currentTime > in_newTime ){
        document.getElementById("isLate").value = 1;
        
        //minutes late computation
        var timedin = currentTime;
    
        var startTime = new Date();
        startTime.setHours(parseInt(timedin.slice(0, 2)));
        startTime.setMinutes(parseInt(timedin.slice(3, 5)));
        startTime.setSeconds(parseInt(timedin.slice(6, 8)));
        
        var newtime = in_newTime;

        var endTime = new Date();
        endTime.setHours(parseInt(newtime.slice(0, 2)));
        endTime.setMinutes(parseInt(newtime.slice(3, 5)));
        endTime.setSeconds(parseInt(newtime.slice(6, 8)));

        // Calculate the time difference in milliseconds
    
        var timeDiff = startTime - endTime ;

        // Convert the time difference from milliseconds to minutes
        var minutelate = Math.floor(timeDiff / 60000);

        console.log("Minutes Late: ", minutelate);
        document.getElementById("minutesLate").value = minutelate;
        
        
    }else if (currentTime <= in_newTime ){
        document.getElementById("isLate").value = 0;
        document.getElementById("minutesLate").value = 0;
    }


    //determine whether undertime, overtime, or on-time
    if(currentTime < employeetimeend){
        document.getElementById("isOvertime").value = 0;
        document.getElementById("isUndertime").value = 1;

        //minutes undertime computation
        var timedin = currentTime;
    
        var startTime = new Date();
        startTime.setHours(parseInt(timedin.slice(0, 2)));
        startTime.setMinutes(parseInt(timedin.slice(3, 5)));
        startTime.setSeconds(parseInt(timedin.slice(6, 8)));
        
        var e_timeend = employeetimeend;

        var endTime = new Date();
        endTime.setHours(parseInt(e_timeend.slice(0, 2)));
        endTime.setMinutes(parseInt(e_timeend.slice(3, 5)));
        endTime.setSeconds(parseInt(e_timeend.slice(6, 8)));

        // Calculate the time difference in milliseconds
    
        var timeDiff = endTime - startTime;

        // Convert the time difference from milliseconds to minutes
        var minuteundertime = Math.floor(timeDiff / 60000);

        console.log("Minutes Undertime: ", minuteundertime);
        document.getElementById("minutesUndertime").value = minuteundertime;
        document.getElementById("minutesOvertime").value = 0;

    }else if(currentTime > out_newTime){
        document.getElementById("isOvertime").value = 1;
        document.getElementById("isUndertime").value = 0;

        //minutes overtime computation
        var timedin = currentTime;
    
        var startTime = new Date();
        startTime.setHours(parseInt(timedin.slice(0, 2)));
        startTime.setMinutes(parseInt(timedin.slice(3, 5)));
        startTime.setSeconds(parseInt(timedin.slice(6, 8)));
        
        var newtime = employeetimeend;

        var endTime = new Date();
        endTime.setHours(parseInt(newtime.slice(0, 2)));
        endTime.setMinutes(parseInt(newtime.slice(3, 5)));
        endTime.setSeconds(parseInt(newtime.slice(6, 8)));

        // Calculate the time difference in milliseconds
    
        var timeDiff = startTime - endTime;

        // Convert the time difference from milliseconds to minutes
        var minuteovertime = Math.floor(timeDiff / 60000);

        console.log("Minutes Overtime: ", minuteovertime);
        document.getElementById("minutesUndertime").value = 0;
        document.getElementById("minutesOvertime").value = minuteovertime;
        

    }else if(currentTime >= employeetimeend && currentTime <= out_newTime){
        document.getElementById("isOvertime").value = 0;
        document.getElementById("isUndertime").value = 0;
        document.getElementById("minutesUndertime").value = 0;
        document.getElementById("minutesOvertime").value = 0;
    }

    //hoursworked
    var timein = document.getElementById("timein").value;
    
    var startTime = new Date();
    startTime.setHours(parseInt(timein.slice(0, 2)));
    startTime.setMinutes(parseInt(timein.slice(3, 5)));
    startTime.setSeconds(parseInt(timein.slice(6, 8)));
    
    if(currentTime > employeetimeend){
        var timeout = employeetimeend;
    }else if(currentTime <= employeetimeend){
        var timeout = currentTime;
    }

    var endTime = new Date();
    endTime.setHours(parseInt(timeout.slice(0, 2)));
    endTime.setMinutes(parseInt(timeout.slice(3, 5)));
    endTime.setSeconds(parseInt(timeout.slice(6, 8)));

    // Calculate the time difference in milliseconds
   
    var timeDiff = endTime - startTime;

    // Convert the time difference from milliseconds to hours
    var hoursWorked = timeDiff / (1000 * 60 * 60);
    hoursWorked = hoursWorked.toFixed(2);

    console.log("Hours worked: ", hoursWorked);
    document.getElementById("hoursworked").value = hoursWorked;

   document.getElementById("myForm").submit();
}







