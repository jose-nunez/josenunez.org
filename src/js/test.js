'strict mode';

T1 = function(){
	this.saludo='holita';
}
T1.prototype = {
	saludar:function(nombre) {
		console.log('primero',this);
		console.log(this.saludo+' '+(nombre?nombre:'hueon'));
		that = this;
		var saludar = function(){
			console.log('segundo',this);
			console.log('tercero',that);
		}
		saludar();
	},
};
// T1.prototype.constructor = T1;

test = new T1();
test.saludar('Pepe');
test.saludar();

var a;
if(typeof a !== 'undefined'){
	console.log('hay a ', a);

}
else{console.log(' no hay a');}