$(document).ready(function(){
	$('.tableauUser > tr').click(function(event){
		// On récupère l'id en cliquant sur la ligne du tableau
		var idUser = $(event.target).parent().attr('id');
		// On redirige vers le page view en lui plançant en parametre
		// l'id de l'user que l'on vient de récupérer.
		document.location.href="index.php?uc=user&action=view&id="+idUser;
	});


	$('#experienceContenu').hide();
	$('#formationContenu').hide();
	$('#competenceContenu').hide();
	$('#contactContenu').hide();

	$('.experience').hover(function(){
		$(this).css('cursor', 'pointer');
	});

	$('.formation').hover(function(){
		$(this).css('cursor', 'pointer');
	});

	$('.competence').hover(function(){
		$(this).css('cursor', 'pointer');
	});

	$('.contact').hover(function(){
		$(this).css('cursor', 'pointer');
	});

	$('.experience').click(function(){
		$('#experienceContenu').show();
		$('#formationContenu').hide();
		$('#competenceContenu').hide();
		$('#contactContenu').hide();
	});


	$('.formation').click(function(){
		$('#formationContenu').show();
		$('#experienceContenu').hide();
		$('#competenceContenu').hide();
		$('#contactContenu').hide();
	});

	$('.competence').click(function(){
		$('#competenceContenu').show();
		$('#experienceContenu').hide();
		$('#formationContenu').hide();
		$('#contactContenu').hide();
	});

	$('.contact').click(function(){
		$('#contactContenu').show();
		$('#experienceContenu').hide();
		$('#formationContenu').hide();
		$('#competenceContenu').hide();
	});

});
