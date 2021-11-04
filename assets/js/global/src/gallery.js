function openModal(){
	$('.navbar').css('display','none');
	document.getElementById("lightbox-modal").style.display = "block";
}

function closeModal(){
	$('.navbar').css('display','flex');
	document.getElementById("lightbox-modal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n){
	showSlides(slideIndex += 1);
}

function currentSlide(n){
	showSlides(slideIndex = n);
}

function showSlides(n){
	var i; 
	var slides = document.getElementsByClassName("lightbox-modal__slides");
	var dots = document.getElementsByClassName("lightbox-thumbnail");
	var captionText = document.getElementById('caption')
	
	if(n > slides.length){slideIndex = 1}
	
	if(n < 1) {slideIndex = slides.length}
	for (i = 0; i < slides.length; i++){
		slides[i].style.display = "none";
	}
	for(i = 0; i <dots.length; i++){
		dots[i].className = dots[i].className.replace(" active", "");
	}
	
	var index = slideIndex - 1;
	var caption = dots[index].getAttribute('data-caption');
	if(caption === null){
		$('.caption-container').css('display', "none");
	}else{
		captionText.innerHTMl = caption;
	}
	slides[index].style.display = "block";
	dots[index].className += " active";
}