<style>
    .form-control {
        border: 1px solid #585858;
    }
    .border {
        border: 1px solid #848484 !important;
    }
</style>

    <!-- PARRA LATERAL - SIDEBAR -->
    <?php $this->load->view('layout/sidebar') ?>
    <!-- PARRA LATERAL - SIDEBAR -->

    <!-- BARRA DIREITA -->

    <div id="right-panel" class="right-panel">

        <!-- BARRA SUPERIOR - NAVBAR -->
        <?php $this->load->view('layout/navbar') ?>
        <!-- BARRA SUPERIOR - NAVBAR -->

        <!-- MAIN CONTENT - CONTEÚDO PRINCIPAL -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-size: 1.2em;">Plataforma Administrativa</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('/'); ?>" style="color: #47AA0B;">Home</a></li>
                            <li><a href="#">Orçamentos</a></li>
<!--                            <li><a href="#">Serviços</a></li>-->
                            <li class="active"><?php echo $titulo; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- content -->
        <div class="content mt-1">
            <div class="card">
                <div class="card-header bg-secondary text-light">
                    <strong class="card-title" v-if="headerText">Ordem de Serviços</strong>
                    <a title="Cadastrar nova OS" href="<?php echo base_url('os/add'); ?>" class="btn btn-light btn-sm float-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nova ordem de serviço</a>
                </div>
                
                <div class="card-body" style="border: 1px solid #A4A4A4;">
                    
                <!-- Mensagem de sucesso -->
                <?php if ($message = $this->session->flashdata('sucesso')): ?>
                    <div class="alert  alert-success alert-dismissible fade show " role="alert">
                        <span class="badge badge-pill badge-success"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;&nbsp;Sucesso</span>&nbsp;&nbsp;
                         <?php echo $message; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!-- Mensagem de sucesso -->
                
                <!-- Mensagem de erro -->
                <?php if ($message = $this->session->flashdata('error')): ?>
                    <div class="alert  alert-danger alert-dismissible fade show " role="alert">
                        <span class="badge badge-pill badge-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;&nbsp;Atenção</span>&nbsp;&nbsp;
                         <?php echo $message; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!-- Mensagem de erro -->
                
                <!-- Mensagem de info -->
                <?php if ($message = $this->session->flashdata('info')): ?>
                    <div class="alert  alert-warning alert-dismissible fade show " role="alert">
                        <span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;&nbsp;Advertência</span>&nbsp;&nbsp;
                         <?php echo $message; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!-- Mensagem de info -->
                
                
                   <table class="bootstrap-data-table-export table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Pedido</th>
                                <th class="text-center">Data Emissão</th>
                                <th>Cliente</th>
                                <th>Valor Total</th>
                                <th class="text-center">Situação</th>
                                <th class="text-center">Forma de Pagamento</th>
                                <th class="text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ordens_servicos as $os): ?>
                            <tr>
                                <td class="text-center"><?php echo $os->ordem_servico_id; ?></td>
                                 <td class="text-center"><?php echo $os->ordem_servico_pedido; ?></td>
                                <td class="text-center pr-4"><?php echo formata_data_banco_com_hora($os->ordem_servico_data_emissao); ?></td>
                                <td><?php echo $os->parceiro_nome.'&nbsp;'.$os->parceiro_sobrenome; ?></td>
                                <td><?php echo ('R$ '.$os->ordem_servico_valor_total); ?></td>
                                <td class="text-center pr-4">
                                    <?php echo $os->ordem_servico_status == 1 ? '<span class="badge badge-success btn-sm">Paga</span>' : '<span class="badge badge-secondary btn-sm">Em aberto</span>' ?>
                                </td>
                                <style>
                                    .badge-light {
                                        background: #D8D8D8;
                                        border: #D8D8D8;
                                        font-weight: 650;
                                    }
                                    .btn-danger {
                                            background: #3B0B0B;
                                            border: solid 1px #3B0B0B;
                                    }
                                    .btn-danger:hover {
                                            background: #FE642E;
                                            border: solid 1px #FE642E;
                                    }
                                    .btn-primary {
                                        background: #0B3861;
                                        border: solid 1px #0B3861;
                                    }
                                    .btn-secondary {
                                        background: #DF0101;
                                        border: solid 1px #DF0101;
                                    }
                                    .btn-secondary:hover {
                                        background: #F78181;
                                        border: solid 1px #F78181;
                                    }
                                </style>
                                <td class="text-center pr-4">
                                    <?php echo $os->ordem_servico_status == 1 ? '<span class="badge badge-light btn-sm">'.$os->forma_pagamento.'</span>' : '<span class="badge badge-warning btn-sm">Pendente</span>' ?>
                                </td>
                                <td class="text-right">
                                    <a href="<?php echo base_url('os/edit/'.$os->ordem_servico_id); ?>" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url('os/pdf/'.$os->ordem_servico_id); ?>" target="_blank" class="btn btn-sm btn-secondary" title="Imprimir PDF"><i class="fa fa-file-pdf-o"></i></a>
                                    <a href="javascript(void)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#servico-<?php echo $os->ordem_servico_id; ?>" title="Excluír"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            
                            <div class="modal fade" id="servico-<?php echo $os->ordem_servico_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticModalLabel">Excluír ordem de serviço</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Deseja mesmo excluír esta ordem de servico?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                            <a href="<?php echo base_url('os/del/'.$os->ordem_servico_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
