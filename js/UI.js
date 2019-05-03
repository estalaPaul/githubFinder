class UI {
    constructor() {
        this.profile = document.getElementById('profile');
    }
    showProfile(user) {
        let company, blog, location;
        company = user.company === null ? 'Not specified' : user.company;
        blog = user.blog === "" ? 'Not specified' : user.blog;
        location = user.location === null ? 'Not specified' : user.location;
        this.profile.innerHTML = `
            <div class="card card-body mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-fluid mb-2" src="${user.avatar_url}">
                        <a href="${user.html_url}" target="_blank" class="btn btn-primary btn-block">View Profile</a>
                    </div>
                    <div class="col-md-9">
                        <span class="badge badge-primary">Public Repos: ${user.public_repos}</span>
                        <span class="badge badge-secondary">Public Gists: ${user.public_gists}</span>
                        <span class="badge badge-success">Followers: ${user.followers}</span>
                        <span class="badge badge-info mb-3">Following: ${user.following}</span>
                        <ul class="list-group">
                            <li class="list-group-item">Company: ${company}</li>
                            <li class="list-group-item">Website/Blog: ${blog}</li>
                            <li class="list-group-item">Location: ${location}</li>
                            <li class="list-group-item">Member Since: ${user.created_at}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3 class="page-heading mb-3">Latest Repos</h3>
            <div id="repos"></div>
        `;       
    }
    showRepos(repos) {
        let output = '';
        repos.forEach(repo => {
            output += `
                <div class="card card-body mb-2">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="${repo.html_url}" target="_blank">${repo.name}</a>
                        </div>
                        <div class="col-md-6">
                            <span class="badge badge-primary">Stars: ${repo.stargazers_count}</span>
                            <span class="badge badge-secondary">Watchers: ${repo.watchers_count}</span>
                            <span class="badge badge-success">Forks: ${repo.forks_count}</span>
                        </div>
                    </div>
                </div>
            `;
        });
        document.getElementById('repos').innerHTML = output;
    }
    showAlert(message, htmlClass) {
        this.clearAlert();
        const alert = document.createElement('div');
        alert.className += htmlClass;
        alert.appendChild(document.createTextNode(message));
        const container = document.querySelector('.searchContainer');
        const search = document.querySelector('.search');
        container.insertBefore(alert, search);
        setTimeout(() => {
            this.clearAlert(); 
        }, 3000);
    }
    clearAlert() {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }
    clearProfile() {
        this.profile.innerHTML = '';
    }
}