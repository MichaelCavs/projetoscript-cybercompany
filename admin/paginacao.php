<?php
/**
 * Paginação
 *
 * Cria uma paginação simples.
 *
 * @param int $total_artigos Número total de artigos da sua consulta
 * @param int $artigos_por_pagina Número de artigos a serem exibidos nas páginas
 * @param int $offset Número de páginas a serem exibidas para o usuário
 *
 * @return string A paginação montada
 */
function paginacao( 
    $total_artigos = 0, 
    $artigos_por_pagina = 10, 
    $offset = 5
) {    
    // Obtém o número total de página
    $numero_de_paginas = floor( $total_artigos / $artigos_por_pagina );
    
    // Obtém a página atual
    $pagina_atual = 1;
    
    // Atualiza a página atual se tiver o parâmetro pagina/valor
    if ( ! empty( $_GET['pagina'] ) ) {
        $pagina_atual = (int) $_GET['pagina'];
    }
    
    // Vamos preencher essa variável com a paginação
    $paginas = null;
   
    if ( ! empty( $_GET['pagina'] ) =="0") {
    }else if ( ! empty( $_GET['pagina'] ) =="1") {
    $paginas .= " <a href='lista_computador.php?pagina=0' class='paginacao'>Inicio</a> ";
    }
    // Faz o loop da paginação
    // $pagina_atual - 1 da a possibilidade do usuário voltar
    for ( $i = ( $pagina_atual - 1 ); $i < ( $pagina_atual - 1 ) + $offset; $i++ ) {
        
        // Eliminamos a primeira página (que seria a home do site)
        if ( $i < $numero_de_paginas && $i > 0 ) {
            // A página atual
            $página = $i;
            
            // O estilo da página atual
            $estilo = null;
            
            // Verifica qual dos números é a página atual
            // E cria um estilo extremamente simples para diferenciar
            if ( $i == @$parametros[1] ) {
                $estilo = ' style="color:red;" ';
            }
            
            // Inclui os links na variável $paginas
            $paginas .= " <a $estilo href='lista_computador.php?pagina=$página'>$página</a> ";
        }
        
    } 
    // Retorna o que foi criado
    return $paginas;
    
}
?>