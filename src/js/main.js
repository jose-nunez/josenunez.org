var picturizer = {
	picindex:0,
	myspics:["_avatar.jpg","_avatar2_crop.jpg","_avatar3.jpg"],

	getRandomInt: function(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	},
	switchLang: function(){
		var myname = document.getElementById('myname');
		myname.classList.toggle('spa');
		var myprofession = document.getElementById('myprofession');
		myprofession.classList.toggle('spa');
		var pic = document.getElementById('mypic');
		pic.classList.toggle('spa');
		var pic = document.getElementById('site-title');
		pic.classList.toggle('spa');
	},
	nextPhoto: function(){
		var pic = document.getElementById('mypic');
		this.picindex = this.picindex>=(this.myspics.length-1)? 0 : this.picindex+1;
		pic.src = URL+ '/img/' + this.myspics[this.picindex];
	},
	randomPhoto: function(argument) {
		var pic = document.getElementById('mypic');
		this.picindex = this.getRandomInt(0,2);
		pic.src = URL+ '/img/' + this.myspics[this.picindex];
	},
}

document.addEventListener("DOMContentLoaded", function(event){ 
	picturizer.randomPhoto();
	var pic = document.getElementById('mypic');
	pic.addEventListener('click',function(event){
		picturizer.nextPhoto();
		picturizer.switchLang();
	});
});

// cambiaFoto();