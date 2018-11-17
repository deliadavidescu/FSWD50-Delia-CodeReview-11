

class Locations {
 name:string;
 address:string;
 zipCode:number;
 image:string;
 city:string;
 date:string;

  constructor(name:string, address:string, zipCode:number, image:string, city:string, date:string) {
       this.name=name;
       this.address = address;
       this.zipCode =zipCode;
       this.image=image;
       this.city=city;
       this.date=date;

   }
  render(){
    return document.querySelector("#loc").innerHTML +=`<div class="col-lg-3 col-md-6 col-sd-12 py-2" data-aos="zoom-in" data-aos-duration="900"><div class="card"><img class="card-img-top" src="${this.image}" alt="Card image cap"><div class="card-body"><h5 class="card-title">${this.name}</h5>
    <p class="card-text">${this.address}, ${this.zipCode}, ${this.city} </p><p class="font-italic text-secondary">Created: ${this.date} </p></div></div></div>`
    }
}

class Restaurants extends Locations {
  phoneNumber:string;
  type:string;
  webAddress:string;
  constructor(name:string, address:string, zipCode:number, image:string,city:string, date:string, phoneNumber:string, type:string, webAddress:string) {
      super(name,address, zipCode, image, city, date);
      this.phoneNumber=phoneNumber;
      this.type=type;
      this.webAddress=webAddress;
  }

  render() {
    return document.querySelector("#rest").innerHTML +=`<div class="col-lg-3 col-md-6 col-sd-12 py-2" data-aos="zoom-in" data-aos-duration="900"><div class="card"><img class="card-img-top" src="${this.image}" alt="Card image cap"><div class="card-body"><h5 class="card-title">${this.name}</h5>
    <div class="card-text"><p>Address: ${this.address}, ${this.zipCode}, ${this.city}, ${this.phoneNumber} </p><p><a href="${this.webAddress}">${this.webAddress}</a></p> <p class="font-italic text-secondary">Created: ${this.date}</p></div></div></div></div>`
  }
}

class Events extends Locations {
  eventDate:string;
  eventTime:string;
  ticketPrice:number;
  webAddress:string;
  constructor(name:string, address:string, zipCode:number, image:string, city:string,date:string, eventDate:string, eventTime:string, ticketPrice:number, webAddress:string) {
      super(name,address, zipCode, image, city,date);
      this.eventDate=eventDate;
      this.eventTime=eventTime;
      this.ticketPrice=ticketPrice;
      this.webAddress=webAddress;
  }
  render() {
     return document.querySelector("#event").innerHTML +=`<div class="col-lg-3 col-md-6 col-sd-12 py-2" data-aos="zoom-in"  data-aos-duration="900"><div class="card"><img class="card-img-top" src="${this.image}" alt="Card image cap"><div class="card-body"><h5 class="card-title">${this.name}</h5>
    <div class="card-text"><p><a href="${this.webAddress}">${this.webAddress}</a></p><p>${this.eventDate},${this.eventTime} </p><p>Address: ${this.address}, ${this.zipCode}, ${this.city}</p><p>€ ${this.ticketPrice}</p><p class="font-italic text-secondary">Created: ${this.date}</p> </div></div></div></div>`
  }

}

let arrayLoc:any[]=[];//store all objects

//locations objects
arrayLoc.push(new Locations('St. Charles Church',"Karlsplatz 1", 1010, "./img/church.jpg", "Vienna", "2017-05-30 10:00"));
arrayLoc.push(new Locations('Zoo Vienna',"Maxingstraße 13b", 1030, "./img/zoo.jpg", "Vienna", "2018-04-10 11:30"));
arrayLoc.push(new Locations('Schönbrunn Palace',"Schönbrunner Schloßstraße 47", 1130, "./img/palace.jpg", "Vienna","2018-01-20 12:00"));
arrayLoc.push(new Locations('Prater',"Böcklinstraße 72", 1020, "./img/prater.jpg", "Vienna", "2016-02-13 19:00"));

//restaurant objects
arrayLoc.push(new Restaurants("Lemon Leaf Thai Restaurant","Kettenbrückengasse 19", 1050, "./img/restaurant1.png", "Vienna","2016-03-13 23:10", "+43 1 58 123 08", "indian","http://www.lemonleaf.at/"));
arrayLoc.push(new Restaurants("SIXTA","Schönbrunner Straße 21", 1050, "./img/restaurant2.png", "Vienna", "2016-02-13 05:50","+43 1 58 528 56", "european","http://www.sixta-restaurant.at/"));
arrayLoc.push(new Restaurants("SIXTA","Schönbrunner Straße 21", 1050, "./img/restaurant3.jpg", "Vienna","2016-05-18 20:45", "+43 1 58 528 56", "european","http://www.sixta-restaurant.at/"));
arrayLoc.push(new Restaurants("SIXTA","Schönbrunner Straße 21", 1050, "./img/restaurant4.jpg", "Vienna","2016-09-20 21:23", "+43 1 58 528 56", "european","http://www.sixta-restaurant.at/"));


//events objects
arrayLoc.push(new Events("Kris Kristofferson","Wiener Stadthalle 1", 1150, "./img/event1.jpg", "Vienna", "2018-05-20 12:34","Fr., 15.11.2018", "20:00",58.50,"http://kriskristofferson.com/"));
arrayLoc.push(new Events("Lenny Kravitz","Wiener Stadthalle 1", 1150, "./img/event2.jpg", "Vienna","2018-01-20 18:39", "Sat, 09.12.2019", "19:20",47.80,"http://www.lennykravitz.com/"));
arrayLoc.push(new Events("Contemporary Dance","Wiener Stadthalle 1", 1150, "./img/event3.jpg", "Vienna","2018-01-23 09:15", "Fr., 15.11.2018", "20:00",58.50,"http://kriskristofferson.com/"));
arrayLoc.push(new Events("Party","Wiener Stadthalle 1", 1150, "./img/event4.jpg", "Vienna","2018-02-20 06:38", "Sat, 09.12.2019", "19:20",47.80,"http://www.lennykravitz.com/"));


for (let index in arrayLoc) {
  arrayLoc[index].render();//print classes
}

//Ascending sorting 

function ascSort() {
  for (let i=0; i<arrayLoc.length; i++) {
    arrayLoc.sort(function(a,b){
      return Date.parse(a.date)-Date.parse(b.date);//tranforms dates in millisec and compares them
    })
    document.querySelector("#content").innerHTML +=`<div class="col-lg-3 col-md-6 col-sd-12 py-2" data-aos="zoom-in" 
                                                    data-aos-duration="900"><div class="card"><img class="card-img-top" src="${arrayLoc[i].image}" 
                                                    alt="Card image cap"><div class="card-body"><h5 class="card-title">${arrayLoc[i].name}</h5>
                                                    <p class="card-text">${arrayLoc[i].address}, ${arrayLoc[i].zipCode}, ${arrayLoc[i].city}</p>
                                                    <p class="font-italic text-secondary">Created: ${arrayLoc[i].date} </p></div></div></div>`
  }

  console.log(arrayLoc);
}




//Descending sorting 
function descSort() {
  for (let i=0; i<arrayLoc.length; i++) {
    arrayLoc.sort(function(a,b){
      return Date.parse(b.date)-Date.parse(a.date);//tranforms dates in millisec and compares them
    })
  document.querySelector("#content").innerHTML +=`<div class="col-lg-3 col-md-6 col-sd-12 py-2" data-aos="zoom-in" 
                                                  data-aos-duration="900"><div class="card"><img class="card-img-top" src="${arrayLoc[i].image}" 
                                                  alt="Card image cap"><div class="card-body"><h5 class="card-title">${arrayLoc[i].name}</h5>
                                                  <p class="card-text">${arrayLoc[i].address}, ${arrayLoc[i].zipCode}, ${arrayLoc[i].city}</p>
                                                  <p class="font-italic text-secondary">Created: ${arrayLoc[i].date} </p></div></div></div>`

  console.log(arrayLoc);  
}}


//Increase likes


var hearts = document.getElementsByClassName("fa-heart");
var likes = document.getElementsByClassName("likes");
for(let i=0; i<hearts.length; i++) {
  hearts[i].addEventListener("click",function(){
    console.log(likes[i]);
    var x=Number(likes[i].textContent)+1;
    likes[i].innerHTML= x.toString();
  })
}


