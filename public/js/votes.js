var votes = {
	config:{
		voteEndPoint: "/api/vote",
		wrapperClass: "voting",
		elementClass: "vote",
		el: {},
	},
	submitVote: function(vote,spliction_id,definition_id,session_token, element){
		var httpRequest = new XMLHttpRequest()
		httpRequest.onreadystatechange = function (data) {
			if(httpRequest.readyState === XMLHttpRequest.DONE){
				if(httpRequest.status == 200 && data.currentTarget.response == JSON.stringify(['Success'])){
					votes.config.el.getElementsByClassName('badge')[0].innerText = Number(votes.config.el.getElementsByClassName('badge')[0].innerText) + 1;
				}else if(httpRequest.status == 500){
					$('.fivezerozero-modal-sm').modal('show')
				}else if(httpRequest.status == 429){
					$('.throttle-modal-sm').modal('show')
				}	
			}
		}
		httpRequest.open('POST', votes.config.voteEndPoint )
		httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
		httpRequest.send('vote=' + vote + "&spliction_id=" + spliction_id + "&definition_id=" + definition_id + "&session_token=" + session_token);
	},

	listenForClick: function(){
		[].forEach.call(document.querySelectorAll('.voting span.vote'), function(el) {
		  el.addEventListener('click', function(elementParams) {
		  	votes.config.el = el;
		  	votes.submitVote(el.getAttribute("data-vote"),el.getAttribute("data-spliction_id"),el.getAttribute("data-definition_id"),el.getAttribute('data-session_token'));
		  	
		  })
		})
	}
}
document.addEventListener('DOMContentLoaded', function() {
  votes.listenForClick();
})
