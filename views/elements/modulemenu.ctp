<?php $modules = Configure::read('Settings.modules'); ?>
<?php
echo $this->Javascript->codeBlock('
				$(document).ready(function(){ 
					$("ul.sf-menu").supersubs({ 
						minWidth:	12,	// minimum width of sub-menus in em units 
						maxWidth:	27,	// maximum width of sub-menus in em units 
						extraWidth:	1	// extra width can ensure lines don\'t sometimes turn over 
										// due to slight rounding differences and font-family 
					}).superfish({
						delay:	0,							// one second delay on mouseout			  
						speed:	\'fast\',					// faster animation speed  
					}).find("ul");
				});
			');
?>
<div class="admin_menu">
	<ul class="sf-menu">
		<?php 
			if (isset($module) && 
		($module == 'articles' || 
		$module == 'calendars' ||
		$module == 'ask_expert' ||
		$module == 'uploads' ||
		$module == 'banners' ||
		$module == 'galleries' ||
		$module == 'areas')
			) :
		?>
		<?php if (isset($modules['articles']) && $modules['articles'] == true): ?>
		<li>
			<?php echo $html->link(__("Articles", true), array("plugin" => false, "controller" => "articles", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Add new article", true), array("plugin" => false, "controller" => "articles", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<li>
			<?php echo $html->link(__("Categories", true), array("plugin" => false, "controller" => "categories", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Add new category", true), array("plugin" => false, "controller" => "categories", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<li>
			<?php echo $html->link(__("Menu", true), array("plugin" => false, "controller" => "menus", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("New menu", true), array("plugin" => false, "controller" => "menus", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<?php endif; ?>
		<?php if (isset($modules['calendars']) && $modules['calendars'] == true): ?>
		<li>
			<?php echo $html->link(__("Calendar", true), array("plugin" => false, "controller" => "calendars", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Calendar Items", true), array("plugin" => false, "controller" => "calendars", "action" => "index")); ?>
					<ul>
						<li>
							<?php echo $html->link(__("New calendar item", true), array("plugin" => false, "controller" => "calendars", "action" => "add")); ?>
						</li>
					</ul>
				</li>
				<li>
					<?php echo $html->link(__("Calendar Categories", true), array("plugin" => false, "controller" => "calendar_categories", "action" => "index")); ?>
					<ul>
						<li>
							<?php echo $html->link(__("New calendar category", true), array("plugin" => false, "controller" => "calendar_categories", "action" => "add")); ?>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<?php endif; ?>
		<?php if (isset($modules['ask_expert']) && $modules['ask_expert'] == true): ?>
		<li>
			<?php echo $html->link(__("Ask the expert", true), array("plugin" => false, "controller" => "experts", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Experts", true), array("plugin" => false, "controller" => "experts", "action" => "index")); ?>
					<ul>
						<li>
							<?php echo $html->link(__("New expert", true), array("plugin" => false, "controller" => "experts", "action" => "add")); ?>
						</li>
					</ul>
				</li>
				<li>
					<?php echo $html->link(__("Expert Categories", true), array("plugin" => false, "controller" => "exp_categories", "action" => "index")); ?>
					<ul>
						<li>
							<?php echo $html->link(__("New expert category", true), array("plugin" => false, "controller" => "exp_categories", "action" => "add")); ?>
						</li>
					</ul>
				</li>
				<li>
					<?php echo $html->link(__("Expert Subcategories", true), array("plugin" => false, "controller" => "exp_subcategories", "action" => "index")); ?>
					<ul>
						<li>
							<?php echo $html->link(__("New expert subcategory", true), array("plugin" => false, "controller" => "exp_subcategories", "action" => "add")); ?>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<?php endif; ?>
		<?php if (isset($modules['areas']) && $modules['areas'] == true): ?>
		<li>
			<?php echo $html->link(__("Areas", true), array("plugin" => false, "controller" => "areas", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Add new area", true), array("plugin" => false, "controller" => "areas", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<?php endif; ?>
		<?php if ((isset($modules['uploads']) && $modules['uploads'] == true) || 
					(isset($modules['banners']) && $modules['banners'] == true) || 
					(isset($modules['galleries']) && $modules['galleries'] == true)): ?>
		<li>
			<?php echo $html->link(__("Addons", true), array("plugin" => false, "controller" => "uploads", "action" => "index")); ?>
			<ul>
				<?php if (isset($modules['uploads']) && $modules['uploads'] == true): ?>
				<li>
					<?php echo $html->link(__("Uploads", true), array("plugin" => false, "controller" => "uploads", "action" => "index")); ?>
					<ul>
						<li>
							<?php echo $html->link(__("New upload", true), array("plugin" => false, "controller" => "uploads", "action" => "add")); ?>
						</li>
					</ul>
				</li>
				<?php endif; ?>
				<?php if (isset($modules['banners']) && $modules['banners'] == true): ?>
				<li>
					<?php echo $html->link(__("Banners", true), array("plugin" => false, "controller" => "banners", "action" => "index")); ?>
					<ul>
						<li>
							<?php echo $html->link(__("New banner", true), array("plugin" => false, "controller" => "banners", "action" => "add")); ?>
						</li>
					</ul>
				</li>
				<?php endif; ?>
				<?php if (isset($modules['galleries']) && $modules['galleries'] == true): ?>
				<li>
					<?php echo $html->link(__("Galleries", true), array("plugin" => false, "controller" => "galleries", "action" => "index")); ?>
					<ul>
						<li>
							<?php echo $html->link(__("New gallery", true), array("plugin" => false, "controller" => "galleries", "action" => "add")); ?>
						</li>
					</ul>
				</li>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
		<?php 
			elseif (isset($module) && 
				($module == 'newsletter')
			) : 
		?>
		<li>
			<?php echo $html->link(__("E-mails", true), array("plugin" => false, "controller" => "mails", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("New e-mail", true), array("plugin" => false, "controller" => "mails", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<li>
			<?php echo $html->link(__("Newsletters", true), array("plugin" => false, "controller" => "newsletters", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("New newsletter", true), array("plugin" => false, "controller" => "newsletters", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<?php 
			elseif (isset($module) && 
				($module == 'permissions')
			) :
		?>
		<li>
			<?php echo $html->link(__("Users", true), array("plugin" => false, "controller" => "users", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Add new user", true), array("plugin" => false, "controller" => "users", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<li>
			<?php echo $html->link(__("Roles", true), array("plugin" => false, "controller" => "roles", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Add new role", true), array("plugin" => false, "controller" => "roles", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<?php 
			elseif (isset($module) && 
				($module == 'settings')
			) :
		?>
		<li>
			<?php echo $html->link(__("Settings", true), array("plugin" => false, "controller" => "configurations", "action" => "index")); ?>
		</li>
		<?php 
			elseif ($this->params['controller'] == 'companies' ||
				$this->params['controller'] == 'contacts' ||
				$this->params['controller'] == 'contact_phones' ||
				$this->params['controller'] == 'contact_emails'
			) :
		?>
		<li>
			<?php echo $html->link(__("Companies", true), array("plugin" => false, "controller" => "companies", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Add new company", true), array("plugin" => false, "controller" => "companies", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<li>
			<?php echo $html->link(__("Contacts", true), array("plugin" => false, "controller" => "contacts", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Add new contact", true), array("plugin" => false, "controller" => "contacts", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<li>
			<?php echo $html->link(__("Phones", true), array("plugin" => false, "controller" => "contact_phones", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Add new phone", true), array("plugin" => false, "controller" => "contact_phones", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<li>
			<?php echo $html->link(__("Emails", true), array("plugin" => false, "controller" => "contact_emails", "action" => "index")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Add new email", true), array("plugin" => false, "controller" => "contact_emails", "action" => "add")); ?>
				</li>
			</ul>
		</li>
		<?php 
			elseif ($this->params['controller'] == 'forums') :
		?>
		<li>
			<?php echo $html->link(__("Forum", true), array("plugin" => false, "controller" => "forums", "action" => "index")); ?>
		</li>
		<?php endif; ?>
	</ul>
	<div style="clear: both"></div>
</div>