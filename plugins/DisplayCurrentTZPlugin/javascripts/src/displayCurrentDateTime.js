/**
 * This file checks time zone differences and displays the relevant current time
 */

//Site TZ offset in mins
const siteTimeOffset = (piwik.timezoneOffset / 60) * -1;

//User TZ offset in mins
const userDate = new Date();
const userTimeOffset = userDate.getTimezoneOffset();

setInterval(updateTime,60000);

function updateTime(){
  updateSiteTime();
  if(userTimeOffset !== siteTimeOffset){
    //Display user zone as well
    updateUserTime();
    document.getElementById('userCurrentTimeContainer').classList.remove("hide");
  }
}

function updateSiteTime(){
  let element = document.getElementById('currentSiteTimeContainer');
  let now = new Date();
  // Set time to UTC
  now.setMinutes(now.getMinutes() + now.getTimezoneOffset());
  //Add Piwik Offset to get time in site zone
  now.setMinutes(now.getMinutes() - siteTimeOffset);
  element.innerText = now.toLocaleString([], { dateStyle: 'short', timeStyle: 'short' });
}

function updateUserTime(){
  let element = document.getElementById('currentUserTimeContainer');
  if(element !== null){
    let currentTime = new Date();
    element.innerText = currentTime.toLocaleString([], { dateStyle: 'short', timeStyle: 'short' });
  }
}


