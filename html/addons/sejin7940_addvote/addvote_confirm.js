(function($){$(function(){ 
	var c=$('.xe_content[class*=document_]').eq(0);
	if(c.attr('class'))
	{
		var document_srl=c.attr('class').replace(/.*document_([0-9]+).*/,'$1');
		c.append(addon_addvote_var).find('.wgtRv.addon_addvote button').click(function(){
//			if(addon_addvote_logged) doCallModuleAction('document',(($(this).is('.btn_voted'))?'procDocumentVoteUp':'procDocumentVoteDown'),document_srl);
			if(addon_addvote_logged) {
				// 새로고침 없는 글 추천/비추천 
				if($(this).is('.btn_voted')) {
					if(confirm('추천 하시겠습니까?')) {
						doCallModuleActionDocumentVote('document','procDocumentVoteUp',document_srl);
						return false;
					}
				}
				else if($(this).is('.btn_blamed')) {
					if(confirm('비추천 하시겠습니까?')) {
						doCallModuleActionDocumentVote('document','procDocumentVoteDown',document_srl);
						return false;
					}
				}
				else if($(this).is('.btn_declared')) {
					if(confirm('신고 하시겠습니까?')) {
						doCallModuleActionDocumentVote('document','procDocumentDeclare',document_srl);
						return false;
					}
				}
				else if($(this).is('.btn_scrap')) {
					if(confirm('스크랩 하시겠습니까?')) {
						doCallModuleAction('member','procMemberScrapDocument',document_srl);
						return false;
					}
				}
			}
			else alert(xe.lang.msg_not_logged);
			return false;
		});
	}
}); })(jQuery);


//글의 추천/비추천 새로고침 없이 적용
function doCallModuleActionDocumentVote(module, action, target_srl, vars1) {
	var params = {'target_srl':target_srl,'cur_mid':current_mid, 'vars1':vars1};
	jQuery.exec_json(module+'.'+action, params, completeDocumentVote);
}


function doCallModuleActionDocumentVote_xml(module, action, target_srl, vars1) {
	var params = new Array();
	params['target_srl'] = target_srl;
	params['cur_mid'] = current_mid;
	params['vars1'] = vars1;

	var response_tags = ['error','message','voted_count','blamed_count','declared_count'];
	exec_xml(module, action, params, completeDocumentVote, response_tags);
}


function completeDocumentVote(ret_obj, response_tags) {
	var error = ret_obj.error;
	var message = ret_obj.message;
	var voted_count = ret_obj.voted_count;
	var blamed_count = ret_obj.blamed_count;
	var declared_count = ret_obj.declared_count;

	if(!isNaN(parseInt(voted_count))) {
		alert(voted_count+'번째로 '+xe.lang.success_voted);
		jQuery('#document_voted_count').html(voted_count);
	}
	if(!isNaN(parseInt(blamed_count))) {
		alert((-1)*blamed_count+'번째로 '+xe.lang.success_blamed);
		jQuery('#document_blamed_count').html(blamed_count);
	}
	if(!isNaN(parseInt(declared_count))) {
		alert(declared_count+'번째로 '+xe.lang.success_declared);
		jQuery('#document_declared_count').html(declared_count);
	}
}