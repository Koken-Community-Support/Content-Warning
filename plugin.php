<?php

class BaldursPhotographyContetnWarning extends KokenPlugin {

	function __construct()
	{
		$this->require_setup = true;
		$this->register_hook('before_closing_body', 'render');
	}

	function render()
	{

		$message		= $this->data->contentwarning_message;
		$dismiss		= $this->data->contentwarning_dismiss;
		$learnMore		= $this->data->contentwarning_learnmore;
		$link			= $this->data->contentwarning_link;
		$theme			= $this->data->contentwarning_theme;
		$target			= $this->data->contentwarning_target;
		$cookiedomain	= $this->data->contentwarning_domain;
		$cookiepath		= $this->data->contentwarning_path;
		$cookieexp		= $this->data->contentwarning_expirydays;
		$path			= $this->get_path();

		echo <<<OUT
<script type="text/javascript">
	window.contentwarning_options = {
		message: '{$message}',
		dismiss: '{$dismiss}',
		learnMore: '{$learnMore}',
		link: '{$link}',
		target: '_{$target}',
		theme: '{$path}/styles/{$theme}.css',
		domain: '{$cookiedomain}',
		path: '{$cookiepath}',
		expiryDays: '{$cookieexp}'
	}
</script>
<script type="text/javascript" src="{$path}/contentwarning.min.js"></script>
OUT;
	}
}
