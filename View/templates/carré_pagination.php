
<?php
    $current_page = $data_page['number'] ?? 0;
    $total_pages = $data_page['totalPages'] ?? 0;
    $recherche="query=$query&lang=$lang&habitats=$habitas&page=";
    echo '<div class="container_pagination">';
    echo '<div class="pagination mx-auto text-center">';
            
    $first_page_link = $recherche . '1';
    $previous_page_link = $recherche . ($current_page - 1);
    $next_page_link = $recherche . ($current_page + 1);
    $last_page_link = $recherche . $total_pages;

    echo ($current_page > 1) ? "<a href=\"?$first_page_link\">&lt;&lt;</a>" : '<a class="disabled">&lt;&lt;</a>';
    echo ' ';
    echo ($current_page > 1) ? "<a href=\"?$previous_page_link\">&lt;</a>" : '<a class="disabled">&lt;</a>';
    echo ' ';
            
    $start_page = max(1, $current_page - 2);
    $end_page = min($total_pages, $start_page + 4);
            
    for ($i = $start_page; $i <= $end_page; $i++) {
    $page_link = $recherche . $i;
    $class = ($i === $current_page) ? 'current' : '';
        echo "<a href=\"?$page_link\" class=\"$class\">$i</a> ";
    }
            
    echo ($current_page < $total_pages) ? "<a href=\"?$next_page_link\">&gt;</a>" : '<a class="disabled">&gt;</a>';
    echo ($current_page < $total_pages) ? "<a href=\"?$last_page_link\">&gt;&gt;</a>" : '<a class="disabled">&gt;&gt;</a>';
            
    echo '</div>';
    echo '</div>';

?>