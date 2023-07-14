
function passCheck(data){

    var passClass = document.getElementsByClassName('password-check');

    const lowerupperCase= new RegExp("^(?=.*[a-z])(?=.*[A-Z])");
    const Numerical = new RegExp("^(?=.*[0-9])");
    const eightChar = new RegExp("^(?=.{8,15})");


    if(eightChar.test(data)){
        passClass[0].style.color="green";
    }else{
        passClass[0].style.color="red"
    }

    if(lowerupperCase.test(data)){
        passClass[1].style.color="green";
    }else{
        passClass[1].style.color="red"
    }

    if(Numerical.test(data)){
        passClass[2].style.color="green";
    }else{
        passClass[2].style.color="red"
    }
}

function displayForm(){

  
    document.getElementById('ext').style.display='none';
    document.getElementById('cin').style.display='block';

    if(document.getElementById('interne').checked){
        document.getElementById('ext').style.display='none';
        document.getElementById('cin').style.display='block';
    }else if(document.getElementById('externe').checked) {
        document.getElementById('ext').style.display='block';
        document.getElementById('cin').style.display='none';
    }
}

function showForm(){

    document.getElementById('ext_article').style.display='none';
    document.getElementById('cin_article').style.display='block';

    if(document.getElementById('interne_article').checked){
        document.getElementById('ext_article').style.display='none';
        document.getElementById('cin_article').style.display='block';
    }else if(document.getElementById('externe_article').checked) {
        document.getElementById('ext_article').style.display='block';
        document.getElementById('cin_article').style.display='none';
    }
}



function cinLength(evt){
                
    var ch = document.getElementById('cin');
    var length= ch.length;

    if(!(length==8)){
        document.getElementById('cin-check').innerHTML="Entrer une cin valide ! ";
        document.getElementById('cin-check').style.color="red";
    }else{
        document.getElementById('cin-check').innerHTML="good!";
    }
   
}


const ouvrage = document.getElementById('ouvrage_scientifique');
const article = document.getElementById('article_scientifique');
const chapitre = document.getElementById('chapitre_ouvrage');
const these = document.getElementById('these');
const hab = document.getElementById('hab');
const pfe = document.getElementById('pfe');
const brevet = document.getElementById('brevet');
const conference = document.getElementById('conference');
const pub = document.getElementById('pub');

function showArticle(){
    if(article.style.display==="none"){ 
        article.style.display="block";
        ouvrage.style.display="none";
        chapitre.style.display="none";
        conference.style.display="none";
        brevet.style.display="none";
    }
}
function showOuvrage(){
    
    if(ouvrage.style.display === "none"){
        ouvrage.style.display="block";
        article.style.display="none";
        chapitre.style.display="none";
        conference.style.display="none";
        brevet.style.display="none";
    }
}   
function showChapitre(){
    if(chapitre.style.display === "none"){
        chapitre.style.display="block";
        article.style.display="none";
        ouvrage.style.display="none";
        conference.style.display="none";
        brevet.style.display="none";
    }

}
function showBrevet(){
    if(brevet.style.display === "none"){
        brevet.style.display="block";
        article.style.display="none";
        ouvrage.style.display="none";
        chapitre.style.display="none";
        conference.style.display="none";
       
    }
}
function showConferance(){
  if(conference.style.display === "none"){
      conference.style.display="block";
      article.style.display="none";
      ouvrage.style.display="none";
      chapitre.style.display="none";
      brevet.style.display="none";
  }
}


function showThese(){
    if(these.style.display === "none"){
        these.style.display="block";
        hab.style.display="none";
        pfe.style.display="none";
        
    }
}
function showHabilitation(){
  if(hab.style.display === "none"){
      hab.style.display="block";
      these.style.display="none";
      pfe.style.display="none";
      
  }
}
function showPfe(){
  if(pfe.style.display === "none"){
      pfe.style.display="block";
      hab.style.display="none";
      these.style.display="none";
  }
}





$(document).on('click','#remove', function (e) {
    e.preventDefault();
    let row_item = $(this).parent().parent()
    $(row_item).remove();
   
    
});



$(document).on('click','#remove', function (e) {
    e.preventDefault();
    let row_item = $(this).parent().parent()
    $(row_item).remove();
   
    
});

"use strict";

var indicator = document.querySelector('.nav-indicator');
var items = document.querySelectorAll('.nav-item');

function handleIndicator(el) {
  items.forEach(function (item) {
    item.classList.remove('is-active');
    item.removeAttribute('style');
  });
  indicator.style.width = "".concat(el.offsetWidth, "px");
  indicator.style.left = "".concat(el.offsetLeft, "px");
  indicator.style.backgroundColor = el.getAttribute('active-color');
  el.classList.add('is-active');
  el.style.color = el.getAttribute('active-color');
}

items.forEach(function (item, index) {
  item.addEventListener('click', function (e) {
    handleIndicator(e.target);
  });
  item.classList.contains('is-active') && handleIndicator(item);
});
     

const events = [
    {
      summary: 'JS Conference',
      start: {
        date: Calendar.dayjs().format('DD/MM/YYYY'),
      },
      end: {
        date: Calendar.dayjs().format('DD/MM/YYYY'),
      },
      color: {
        background: '#cfe0fc',
        foreground: '#0a47a9',
      },
    },
    {
      summary: 'Vue Meetup',
      start: {
        date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
      },
      end: {
        date: Calendar.dayjs().add(5, 'day').format('DD/MM/YYYY'),
      },
      color: {
        background: '#ebcdfe',
        foreground: '#6e02b1',
      },
    },
    {
      summary: 'Angular Meetup',
      description: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur',
      start: {
        date: Calendar.dayjs().subtract(3, 'day').format('DD/MM/YYYY'),
        dateTime: Calendar.dayjs().subtract(3, 'day').format('DD/MM/YYYY') + ' 10:00',
      },
      end: {
        date: Calendar.dayjs().add(3, 'day').format('DD/MM/YYYY'),
        dateTime: Calendar.dayjs().add(3, 'day').format('DD/MM/YYYY') + ' 14:00',
      },
      color: {
        background: '#c7f5d9',
        foreground: '#0b4121',
      },
    },
    {
      summary: 'React Meetup',
      start: {
        date: Calendar.dayjs().add(5, 'day').format('DD/MM/YYYY'),
      },
      end: {
        date: Calendar.dayjs().add(8, 'day').format('DD/MM/YYYY'),
      },
      color: {
        background: '#fdd8de',
        foreground: '#790619',
      },
    },
    {
      summary: 'Meeting',
      start: {
        date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
        dateTime: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY') + ' 8:00',
      },
      end: {
        date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
        dateTime: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY') + ' 12:00',
      },
      color: {
        background: '#cfe0fc',
        foreground: '#0a47a9',
      },
    },
    {
      summary: 'Call',
      start: {
        date: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY'),
        dateTime: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY') + ' 11:00',
      },
      end: {
        date: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY'),
        dateTime: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY') + ' 14:00',
      },
      color: {
        background: '#292929',
        foreground: '#f5f5f5',
      },
    }
  ];
  
  const calendarElement = document.getElementById('calendar-7');
  const calendarInstance = Calendar.getInstance(calendarElement);
  calendarInstance.addEvents(events);



function showPub(){
  if(pub.style.display === "none"){
     pub.style.display="block";
  }
  else if(pub.style.display === "block"){
    pub.style.display="none";
  }
    
  
}