<?php 

	shell_exec("conda update --update-all");
	shell_exec("conda update anaconda");
	shell_exec("conda create -n py38 python=3.8 anaconda");
	shell_exec("conda activate py38");

	shell_exec("curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | bash");

	shell_exec("python -m pip install --install-option='--prefix=/' neuroglancer");

	shell_exec("python /server.py");
	shell_exec("python /test_ng.py");

?>