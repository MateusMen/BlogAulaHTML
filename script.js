// Simule a exibição de postagens recentes na página principal
const postList = document.getElementById('postList');
for (let i = 0; i < 5; i++) {
    const li = document.createElement('li');
    li.textContent = 'Título da Postagem ' + (i + 1) + ' - Autor';
    postList.appendChild(li);
}

function login() {
    // Lógica de autenticação aqui
    // Use JavaScript para verificar se o usuário e a senha estão corretos
    // Simule o login e redirecione para a página de postagens (posts.html) se estiver correto
    // Caso contrário, exiba uma mensagem de erro
}

function cadastrar() {
    // Lógica de cadastro de usuário aqui
    // Use JavaScript para inserir um novo usuário na tabela "users"
    // Simule o cadastro e redirecione para a página de login (login.html) se estiver correto
    // Caso contrário, exiba uma mensagem de erro
}

function criarPost() {
    // Lógica de criação de postagem aqui
    // Use JavaScript para inserir uma nova postagem na tabela "posts"
    // Simule a criação e redirecione para a página de postagens (posts.html) se estiver correto
    // Caso contrário, exiba uma mensagem de erro
}

function displayPosts(){
    //essa função ainda e wip
    // Fetch the posts from the server
fetch('fetch_posts.php')
.then(response => response.json())
.then(posts => {
  // Iterate over the posts and display them
  for (let post of posts) {
    const postContainer = document.createElement('div');
    postContainer.innerHTML = `
      <h2>${post.title}</h2>
      <p>${post.content}</p>
      <p><em>Author: ${post.author}</em></p>
      <p><em>Created at: ${post.created_at}</em></p>
      <hr>
    `;
    document.body.appendChild(postContainer);
  }
});
}

function exibirPostsRecentes() {
    const postList = document.getElementById('postList');

    const posts = [
        { id: 1, title: 'Título do Post 1', author: 'Autor 1' },
        { id: 2, title: 'Título do Post 2', author: 'Autor 2' },
        { id: 3, title: 'Título do Post 3', author: 'Autor 3' },
        { id: 4, title: 'Título do Post 4', author: 'Autor 4' },
        { id: 5, title: 'Título do Post 5', author: 'Autor 5' }
    ];

    // Limpar a lista de posts
    postList.innerHTML = '';

    // Exibir os últimos 5 posts na lista
    for (let i = 0; i < posts.length; i++) {
        const post = posts[i];

        const li = document.createElement('li');
        li.textContent = post.title + ' - ' + post.author;
        postList.appendChild(li);
    }
}
