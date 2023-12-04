<?
  function getEveryRow($connection, $table) {
    $select_rows_query = "SELECT * FROM $table";
    $stmt_select_rows = $connection -> prepare($select_rows_query);
    $stmt_select_rows -> execute();
    $result_selected_rows = $stmt_select_rows -> get_result();

    return $result_selected_rows;
  }

  function getEveryAuthorInLinkTable($connection, $book_id) {
    $select_linked_authors_query = "SELECT author.name, author.last_name FROM book_author JOIN author ON book_author.author_id = author.author_id WHERE book_author.book_id = ?";
    $stmt_select_linked_authors = $connection -> prepare($select_linked_authors_query);
    $stmt_select_linked_authors -> bind_param("i", $book_id);
    $stmt_select_linked_authors -> execute();
    $result_linked_authors = $stmt_select_linked_authors -> get_result();

    return $result_linked_authors;
  }

  function getEveryRowInLinkTableWithAnAuthor($connection, $author_id) {
    $select_linked_rows_query = "SELECT * FROM book_author WHERE author_id = ?";
    $stmt_select_linked_rows = $connection -> prepare($select_linked_rows_query);
    $stmt_select_linked_rows -> bind_param("i", $author_id);
    $stmt_select_linked_rows -> execute();
    $result_linked_rows = $stmt_select_linked_rows -> get_result();

    return $result_linked_rows;
  }

  function getAuthorList($connection) {
    $select_authors_list_query = "SELECT * FROM author";
    $stmt_select_authors_list = $connection -> prepare($select_authors_list_query);
    $stmt_select_authors_list -> execute();
    $authors_list = $stmt_select_authors_list -> get_result();

    return $authors_list;
  }

  function insertNewAuthor($connection, $new_author_name, $new_author_last_name) {
    $insert_author_query = "INSERT INTO author (name, last_name) VALUES (?, ?)";
    $stmt_insert_author = $connection -> prepare($insert_author_query);
    $stmt_insert_author -> bind_param("ss", $new_author_name, $new_author_last_name);
    $stmt_insert_author -> execute();

    return $stmt_insert_author;
  }

  function getBookList($connection) {
    $select_book_list_query = "SELECT * FROM book";
    $stmt_select_book_list = $connection -> prepare($select_book_list_query);
    $stmt_select_book_list -> execute();
    $book_list = $stmt_select_book_list -> get_result();

    return $book_list;
  }

  function getSpecificBook($connection, $book_id) {
    $select_specific_book_query = "SELECT * FROM book WHERE book_id = ?";
    $stmt_select_specific_book = $connection -> prepare($select_specific_book_query);
    $stmt_select_specific_book -> bind_param("i", $book_id);
    $stmt_select_specific_book -> execute();
    $specific_book = $stmt_select_specific_book -> get_result();

    return $specific_book;
  }

  function insertNewBook($connection, $new_book_title, $new_book_genre, $new_book_country, $new_book_year_published, $new_book_num_pages) {
    $insert_book_query = "INSERT INTO book (title, genre, country, year_published, num_pages) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert_book = $connection -> prepare($insert_book_query);
    $stmt_insert_book -> bind_param("sssss", $new_book_title, $new_book_genre, $new_book_country, $new_book_year_published, $new_book_num_pages);
    $stmt_insert_book -> execute();

    return $stmt_insert_book;
  }

  function insertLinkedAuthorAndBook($connection, $selected_authors, $book_id) {
    $insert_author_query = "INSERT INTO book_author (book_id, author_id) VALUES (?, ?)";
    $stmt_insert_author = $connection -> prepare($insert_author_query);

    foreach ($selected_authors as $author_id) {
      $stmt_insert_author -> bind_param("ii", $book_id, $author_id);
      $stmt_insert_author -> execute();
    }

    return $stmt_insert_author;
  }

  function deleteSpecificBook($connection, $book_id) {
    $delete_book_query = "DELETE FROM book WHERE book_id = ?";
    $stmt_delete_book = $connection -> prepare($delete_book_query);
    $stmt_delete_book -> bind_param("i", $book_id);
    $stmt_delete_book -> execute();

    return $stmt_delete_book;
  }

  function deleteLinkedBook($connection, $book_id) {
    $delete_linked_book_query = "DELETE FROM book_author WHERE book_id = ?";
    $stmt_delete_linked_book = $connection -> prepare($delete_linked_book_query);
    $stmt_delete_linked_book -> bind_param("i", $book_id);
    $stmt_delete_linked_book -> execute();

    return $stmt_delete_linked_book;
  }

  function deleteSpecificAuthor($connection, $author_id) {
    $delete_author_query = "DELETE FROM author WHERE author_id = ?";
    $stmt_delete_author = $connection -> prepare($delete_author_query);
    $stmt_delete_author -> bind_param("i", $author_id);
    $stmt_delete_author -> execute();

    return $stmt_delete_author;
  }

  function updateBookAuthors($connection, $selected_authors, $book_id) {
    clearBookAuthorCoincidences($connection, $book_id);

    $insert_author_query = "INSERT INTO book_author (book_id, author_id) VALUES (?, ?)";
    $stmt_insert_author = $connection -> prepare($insert_author_query);

    foreach ($selected_authors as $author_id) {
      $stmt_insert_author -> bind_param("ii", $book_id, $author_id);
      $stmt_insert_author -> execute();
    }

    return $stmt_insert_author;
  }

  function clearBookAuthorCoincidences($connection, $book_id) {
    $delete_linked_book_query = "DELETE FROM book_author WHERE book_id = ?";
    $stmt_delete_linked_book = $connection -> prepare($delete_linked_book_query);
    $stmt_delete_linked_book -> bind_param("i", $book_id);
    $stmt_delete_linked_book -> execute();
  }

  function searchSpecificBook($connection, $search_query) {
    $search_book_query = "SELECT DISTINCT book.* FROM book LEFT JOIN book_author ON book.book_id = book_author.book_id LEFT JOIN author ON book_author.author_id = author.author_id WHERE LOWER(book.title) LIKE ? OR LOWER(book.genre) LIKE ? OR LOWER(book.country) LIKE ? OR LOWER(book.year_published) LIKE ? OR LOWER(book.num_pages) LIKE ? OR LOWER(author.name) LIKE ? OR LOWER(author.last_name) LIKE ? OR LOWER(CONCAT(author.name, \" \", author.last_name)) LIKE ?";
    $search_param = "%" . strtolower($search_query) . "%";
    $stmt_search_book = $connection -> prepare($search_book_query);
    $stmt_search_book -> bind_param("ssssssss", $search_param, $search_param, $search_param, $search_param, $search_param, $search_param, $search_param, $search_param);
    $stmt_search_book -> execute();
    $books = $stmt_search_book -> get_result();

    return $books;
  }
?>