<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

					<div class="auth_choice">
						<div class="auth_user">
							<h3>{user_fullname}</h3>
						</div>

						<?php
							echo anchor(site_url(Hasher::make(20)), 'Administracion');
							echo anchor(site_url(Hasher::make(1)), 'Sitio Web');
						?>
					</div>
