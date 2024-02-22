<?php
$is_https = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
$protocol = $is_https ? 'https' : 'http';

$URL_ATUAL = "$protocol://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$str = $URL_ATUAL;
$str = explode("edit/", $str);

$URL_ATUAL2 = "$protocol://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$str2 = $URL_ATUAL2;
$str2 = explode("relacionar/", $str2);

$URL_ATUAL3 = "$protocol://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$str3 = $URL_ATUAL3;
$str3 = explode("add/", $str3);

$URL_ATUAL4 = "$protocol://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$str4 = $URL_ATUAL4;
$str4 = explode("?", $str4);

$url = current_url();

$edit_persona1 = '#' . preg_quote(base_url('/parceiros/edit/')) . '\d+#';
$edit_persona2 = '#' . preg_quote(base_url('/vendedores/edit/')) . '\d+#';
$edit_persona3 = '#' . preg_quote(base_url('/usuarios/edit/')) . '\d+#';
$edit_persona4 = '#' . preg_quote(base_url('/clientes/edit/')) . '\d+#';

$edit_stock1 = '#' . preg_quote(base_url('/categorias/edit/')) . '\d+#';
$edit_stock2 = '#' . preg_quote(base_url('/marcas/edit/')) . '\d+#';
$edit_stock3 = '#' . preg_quote(base_url('/produtos/edit/')) . '\d+#';

$edit_service1 = '#' . preg_quote(base_url('/servicos/edit/')) . '\d+#';

?>
		<!-- HEADER MOBILE-->
		<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?php echo base_url('/'); ?>">
                            <img src="<?php echo base_url('public/images/icon/SisConsig06.png" alt="SisConsig'); ?>" style="width: 50% !important;" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">

					<ul class="navbar-mobile__list list-unstyled">
						<li class="active has-sub">
                            <a class="js-arrow" href="<?php echo base_url('/'); ?>">
                                <i class="fas fa-tachometer-alt"></i>Home</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                            <i class="fa fa-users"></i>Pessoas <span class="float-right" style="font-size:.6em;"><i class="fa fa-chevron-down pt-2" aria-hidden="true"></i></span></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('/'); ?>clientes"><span style="font-size: .8em;">Clientes</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>usuarios"><span style="font-size: .8em;">Colaboradores</span></a>
								</li>
								<li>
                                    <a href="<?php echo base_url('/'); ?>parceiros"><span style="font-size: .8em;">Parceiros</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>vendedores"><span style="font-size: .8em;">Vendedores</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-archive"></i>Estoque <span class="float-right" style="font-size:.6em;"><i class="fa fa-chevron-down pt-2" aria-hidden="true"></i></span></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
								<li>
                                    <a href="<?php echo base_url('/'); ?>categorias"><span style="font-size: .8em;">Categorias</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>marcas"><span style="font-size: .8em;">Marcas</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>produtos"><span style="font-size: .8em;">Produtos</span></a>
                                </li>
                            </ul>
                        </li>
						<li class="has-sub">
                            <a class="js-arrow" href="<?php echo base_url('/'); ?>servicos">
                                <i class="fas fa-server"></i>Serviços</a>
                        </li>
						<li class="has-sub">
                            <a class="js-arrow" href="#">
                              <i class="fa fa-credit-card" aria-hidden="true"></i>Financeiro <span class="float-right" style="font-size:.6em;"><i class="fa fa-chevron-down pt-2" aria-hidden="true"></i></span></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('/'); ?>contas_pagar"><span style="font-size: .8em;">Contas a Pagar</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>contas_receber"><span style="font-size: .8em;">Contas a Receber</span></a>
                                </li>
								<li>
                                    <a href="<?php echo base_url('/'); ?>modulo"><span style="font-size: .8em;">Formas de Pagamentos</span></a>
                            </ul>
                        </li>
						<li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-cart"></i>Pedidos <span class="float-right" style="font-size:.6em;"><i class="fa fa-chevron-down pt-2" aria-hidden="true"></i></span></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('/'); ?>pedidos"><span style="font-size: .8em;">Ordem de Serviços</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>vendas"><span style="font-size: .8em;">Vendas produtos</span></a>
                                </li>
                            </ul>
						<li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-cogs"></i>Ferramentas <span class="float-right" style="font-size:.6em;"><i class="fa fa-chevron-down pt-2" aria-hidden="true"></i></span></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('/'); ?>kb"><span style="font-size: .8em;">Base de Conhecimento</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>tickets"><span style="font-size: .8em;">Tickets (chamados)</span></a>
                                </li>
								<li>
                                    <a href="<?php echo base_url('/'); ?>sistema"><span style="font-size: .8em;">Configurações da Loja</span></a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="#" data-toggle="modal"  data-target="#staticModal" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sign-out"></i>Sair</a>
                        </li>
                        <li class="mb-2 pb-2 pt-2 text-center">
                          <span class="p-1 pl-2 pr-2 text-center text-light bg-dark" style="font-size: .7em;border-radius:3px;"><strong><red style="color:#FA5858">Sis</red><red style="color:#D8D8D8">Cad</red>Pro &copy; </strong>| Versão 2.0.0</span>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?php echo base_url('/'); ?>">
                    <img src="<?php echo base_url('public/images/icon/SisConsig06.png'); ?>" alt="SisConsig" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
				<nav class="navbar-sidebar" style="margin-top: -10px !important;">
                    <ul class="list-unstyled navbar__list">
						<li class="<?php echo $URL_ATUAL == base_url('/home') || $URL_ATUAL == base_url('/') ? 'active' : ''; ?> has-sub">
                            <a class="js-arrow" href="<?php echo base_url('/'); ?>">
                                <i class="fas fa-tachometer-alt"></i>Home</a>
                        </li><hr />
                        <li class="<?php if (current_url() == base_url('/parceiros') || current_url() == base_url('/vendedores') || current_url() == base_url('/clientes') || current_url() == base_url('/usuarios') || current_url() == base_url('/parceiros/add') || current_url() == base_url('/parceiros/edit') || current_url() == base_url('/vendedores/add') || preg_match($edit_persona1, $url) || preg_match($edit_persona2, $url) || current_url() == base_url('/usuarios/add') || preg_match($edit_persona3, $url) || current_url() == base_url('/clientes/add') || preg_match($edit_persona4, $url)) { echo 'active'; } else { echo ''; } ?> has-sub">
                            <a class="js-arrow" href="#">
                            <i class="fa fa-users"></i>Pessoas <span class="float-right" style="font-size:.6em;"><i class="fa fa-chevron-down pt-2" aria-hidden="true"></i></span></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('/'); ?>clientes"><span style="font-size: .8em;">Clientes</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>usuarios"><span style="font-size: .8em;">Colaboradores</span></a>
                                </li>
								<li>
                                    <a href="<?php echo base_url('/'); ?>parceiros"><span style="font-size: .8em;">Parceiros</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>vendedores"><span style="font-size: .8em;">Vendedores</span></a>
                                </li><hr>
                            </ul>
                        </li>
                        <li class="<?php if (current_url() == base_url('/categorias') || current_url() == base_url('/marcas') || current_url() == base_url('/produtos') || current_url() == base_url('/categorias/add') || current_url() == base_url('/marcas/add') || preg_match($edit_stock1, $url) || preg_match($edit_stock2, $url) || current_url() == base_url('/produtos/add') || preg_match($edit_stock3, $url)) { echo 'active'; } else { echo ''; } ?> has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-archive"></i>Estoque <span class="float-right" style="font-size:.6em;"><i class="fa fa-chevron-down pt-2" aria-hidden="true"></i></span></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
								<li>
                                    <a href="<?php echo base_url('/'); ?>categorias"><span style="font-size: .8em;">Categorias</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>marcas"><span style="font-size: .8em;">Marcas</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>produtos"><span style="font-size: .8em;">Produtos</span></a>
                                </li><hr>
                            </ul>
                        </li>
						<li class="<?php if (current_url() == base_url('/servicos') || current_url() == base_url('/servicos/add') || preg_match($edit_service1, $url)) { echo 'active'; } else { echo ''; } ?> has-sub">
                            <a class="js-arrow" href="<?php echo base_url('/'); ?>servicos">
                                <i class="fas fa-server"></i>Serviços</a>
                        </li><hr />
						<li class="has-sub">
                            <a class="js-arrow" href="#">
                              <i class="fa fa-credit-card" aria-hidden="true"></i>Financeiro <span class="float-right" style="font-size:.6em;"><i class="fa fa-chevron-down pt-2" aria-hidden="true"></i></span></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('/'); ?>contas_pagar"><span style="font-size: .8em;">Contas a Pagar</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>contas_receber"><span style="font-size: .8em;">Contas a Receber</span></a>
                                </li>
								<li>
                                    <a href="<?php echo base_url('/'); ?>modulo"><span style="font-size: .8em;">Formas de Pagamentos</span></a>
                                </li><hr>
                            </ul>
                        </li>
						<li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-cart"></i>Pedidos <span class="float-right" style="font-size:.6em;"><i class="fa fa-chevron-down pt-2" aria-hidden="true"></i></span></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('/'); ?>pedidos"><span style="font-size: .8em;">Ordem de Serviços</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>vendas"><span style="font-size: .8em;">Vendas produtos</span></a>
                                </li>
                            </ul>
                        </li><hr>
						<li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-cogs"></i>Ferramentas <span class="float-right" style="font-size:.6em;"><i class="fa fa-chevron-down pt-2" aria-hidden="true"></i></span></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('/'); ?>kb"><span style="font-size: .8em;">Base de Conhecimento</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/'); ?>tickets"><span style="font-size: .8em;">Tickets (chamados)</span></a>
                                </li>
								<li>
                                    <a href="<?php echo base_url('/'); ?>sistema"><span style="font-size: .8em;">Configurações da Loja</span></a>
                                </li>
                            </ul>
                        </li><hr />
						<li>
                            <a href="#" data-toggle="modal"  data-target="#staticModal" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sign-out"></i>Sair</a>
                        </li><hr>
                        <li class="mb-2">
                          <span class="p-1 pl-2 pr-2 text-center text-light bg-dark" style="font-size: .7em;border-radius:3px;"><strong><red style="color:#FA5858">Sis</red>C<red style="color:#FC9D0E">onsig</red> &copy; </strong>| Versão 1.0.0</span>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
