# Github Finder

Website that allows you to search for Github Users and will display their information. Created using JS, HTML/CSS, PHP, and the Github API.

## Usage

To use this website you only need to clone this repository and follow the next steps:

1. Go to your GitHub settings.
2. Go to Developer Settings.
3. Create a new OAuthAPP. This will give you a client secret and a client id. 
4. Create a .ini file and fill with the next values: 
   - `clientId = "CLIENT_ID"`
   - `clientSecret = "CLIENT_SECRET"`
   - `reposCount = NUMBER_OF_REPOS_TO_SHOW`
   - `reposSort = "FILTER_TO_SORT_REPOS"`
   - `header = "User-Agent: GITHUB_USERNAME"`
5. Edit the php/getUser.php and php/getRepos.php files, line 4, so that it points to your .ini file.
   - `$config = parse_ini_file('routetoinifile');`
  
## Disclaimers

This website was created for learning purposes. Feel free to use, distrubute and modify it as you see fit. 
