$('#search').on('click', function(){
    console.log('foo');
    const searchWord = $('#search_word').val();
    console.log(searchWord);
    localStorage.setItem('searchWord', searchWord);
    $.getJSON(
        'https://www.googleapis.com/books/v1/volumes?q=' + searchWord + '&maxResults=5',
        function(data){
            console.dir(data);
            let view = '';
            for(let i = 0; i < data.items.length; i++){
                let item = data.items[i];
                view += '<li id="' + item.id + '" class="result-item" style="width:50px;" onclick="selectBook(this);">';
                view += '<p class="result-item__image"><img class="image" src="' + item.volumeInfo.imageLinks.smallThumbnail + '"></p>';
                view += '<p class="result-item__title">題名：<span class="title-text">' + item.volumeInfo.title + '</span></p>';
                view += '<p class="result-item__authors">著者：<span class="authors-text">' + item.volumeInfo.authors + '</span></p>';
                view += '<p class="result-item__description">説明：<span class="description-text">' + item.volumeInfo.description + '</span></p>';
                view += '<p class="result-item__published-date">出版日：<span class="published-date-text">' + item.volumeInfo.publishedDate + '</span></p>';
                view += '<a href="'+ item.volumeInfo.previewLink +'" target="_blank">もっと見る</a>';
                view += '</li>';
            }
            $('#content1').html(view);
        }
    );
});