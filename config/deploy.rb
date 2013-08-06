set :application, "cg.nwidart.com"
set :repository,  "git@github.com:nWidart/composer-generator.git"

set :scm, :git # You can set :scm explicitly or Capistrano will make an intelligent guess based on known version control directory names
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `git`, `mercurial`, `perforce`, `subversion` or `none`
set :user, 'nico'
set :password, 'blTbTSLHjeEVPFt4'

set :user_sudo, false
set :deploy_to, "/home/htdocs/www.nwidart.com/cg.nwidart.com/public_html"
set :deploy_via, :remote_cache

role :web, "94.23.46.218"                          # Your HTTP server, Apache/etc
role :app, "94.23.46.218"                          # This may be the same as your `Web` server
role :db,  "94.23.46.218", :primary => true # This is where Rails migrations will run
# role :db,  "your slave db-server here"

# --------------------------------------------
# SSH
# --------------------------------------------
ssh_options[:forward_agent] = true
ssh_options[:keys] = [File.join(ENV["HOME"], ".ssh", "naboo_rsa")]
ssh_options[:port] = 16977

# if you want to clean up old releases on each deploy uncomment this:
# after "deploy:restart", "deploy:cleanup"

# if you're still using the script/reaper helper you will need
# these http://github.com/rails/irs_process_scripts

# If you are using Passenger mod_rails uncomment this:
# namespace :deploy do
#   task :start do ; end
#   task :stop do ; end
#   task :restart, :roles => :app, :except => { :no_release => true } do
#     run "#{try_sudo} touch #{File.join(current_path,'tmp','restart.txt')}"
#   end
# end
