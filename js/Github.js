class Github {
    async getUser(user) {
        const profileResponse = await fetch(`./php/getUser.php?user=${user}`);
        const reposResponse = await fetch(`./php/getRepos.php?user=${user}`);
        const profile = await profileResponse.json();
        const repos = await reposResponse.json();
        return {
            profile,
            repos
        };
    }
}