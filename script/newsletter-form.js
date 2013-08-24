	
    /*****************************************************************/
    /*****************************************************************/
	
	function submitNewsletterForm()
	{
		console.info("hello all...");
        blockForm('newsletter-form','block');
	 //   $.post('<?= base_url('newsletter-form/newsletterform'); ?>'),$('#newsletter-form').serialize(),submitNewsletterFormResponse,'json');
	    $.ajax({
        type: "POST",
        url: <?= site_url('Newsletter-form/newsletterform'); ?>
        data: {$('#newsletter-form').serialize()},  // fix: need to append your data to the call
        success: function (data) {
        }
    });

    }
	
	/*****************************************************************/
	
	function submitNewsletterFormResponse(response)
	{
        blockForm('newsletter-form','unblock');
        $('#newsletter-form-mail,#newsletter-form-send').qtip('destroy');

        var tPosition=
        {
            'newsletter-form-send'		: {'my':'right center','at':'left center'},
            'newsletter-form-mail'		: {'my':'bottom center','at':'top center'}
        };

        if(typeof(response.info)!='undefined')
        {	
            if(response.info.length)
            {	
                for(var key in response.info)
                {
                    var id=response.info[key].fieldId;
                    $('#'+response.info[key].fieldId).qtip(
                    {
                            style:      { classes:(response.error==1 ? 'ui-tooltip-error' : 'ui-tooltip-success')},
                            content: 	{ text:response.info[key].message },
                            position: 	{ my:tPosition[id]['my'],at:tPosition[id]['at'] }
                    }).qtip('show');				
                }
            }
        }
	}
	
	/*****************************************************************/
	/*****************************************************************/	