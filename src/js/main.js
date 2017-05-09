var Picturizer = function(box_id,pics) {
	this.mypics = [];
	this.box_id = box_id;

	var img;
	var that = this;
	pics.forEach(function(img_src){
		img = document.createElement("IMG");
		img.src = siteURL+ '/img/' + img_src;
		img.setAttribute('id','mypic');
		img.setAttribute('title','Click me');
		img.classList.add('mypic');
		img.addEventListener('click',function(event){
			that.switchLang(that.nextPhoto());
		});
		that.mypics.push(img);
	});
}

Picturizer.prototype = {
	getRandomInt: function(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	},
	switchLang: function(){
		var myname = document.getElementById('myname');
		myname.classList.toggle('spa');
		var myprofession = document.getElementById('myprofession');
		myprofession.classList.toggle('spa');
		var box = document.getElementById('site-title');
		box.classList.toggle('spa');
		pic = document.getElementById('mypic');
		if(box.classList.contains('spa')) pic.classList.add('spa'); else pic.classList.remove('spa');
	},
	nextPhoto: function(){
		/*var pic = document.getElementById('mypic');
		this.picindex = this.picindex>=(this.mypics.length-1)? 0 : this.picindex+1;
		pic.src = siteURL+ '/img/' + this.mypics[this.picindex];*/
		this.picindex = this.picindex>=(this.mypics.length-1)? 0 : this.picindex+1;
		return this.setPhoto(this.picindex);
	},
	randomPhoto: function(argument) {
		/*var pic = document.getElementById('mypic');
		this.picindex = this.getRandomInt(0,2);
		pic.src = siteURL+ '/img/' + this.mypics[this.picindex];*/
		this.picindex = this.getRandomInt(0,2);
		return this.setPhoto(this.picindex);
	},
	setPhoto:function(index) {
		var img = this.mypics[index];
		var box = document.getElementById(this.box_id);
		var oldImg = document.getElementById('mypic');
		if(oldImg) box.removeChild(oldImg);
		box.appendChild(img);
		return img;
	},
};


document.addEventListener("DOMContentLoaded", function(event){ 
	picturizer = new Picturizer('site-title',["_avatar_1.jpg","_avatar_2.jpg","_avatar_3.jpg"]);
	picturizer.randomPhoto();
});

// cambiaFoto();