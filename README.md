# CodeCourses

__NOTE: compatible with Linux ONLY__


### How to deploy project
1. clone the project into your home directory `cd ~; git clone https://github.com/kerolloz/codecourses.git`
1. install [dependencies](#dependencies) `xampp, docker, PHP 7`
1. execute `ln -s ~/codecourses  /opt/lampp/htdocs` to link the project to the server
1. go to initiate project folder and run the following command `sh RUN_THIS_FILE.sh`

#### Dependencies installation
1. install xampp for linux https://www.apachefriends.org/download.html _Version: ***7.2.12 / PHP 7.2.12***_
1. install docker
```
sudo apt-get update
sudo apt-get install \
   apt-transport-https \
   ca-certificates \
   curl \
   software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo apt-key fingerprint 0EBFCD88
# WARNING: Ubuntu 18.10 users may have problems with the following command
# SOLUTION: replace $(lsb_release -cs) with Bionic
sudo add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
   stable"
sudo apt-get update
sudo apt-get install docker-ce
# If you would like to use Docker as a non-root user
# you should now consider adding your user to the “docker” group
# with something like:
sudo usermod -aG docker $USER
# Remember to log out and back in for this to take effect!
```
1. install php `sudo apt-get install php`


### Noticeable issues
1. to enable uploading and moving files execute the following command <br>
`chmod 777 -R ./{source_codes,judge_tester}` <br>

### Front-End Team
* [Alaa Othman](https://github.com/AlaaOhman)
* [Momen El-Zeiny](https://github.com/MomenElzeiny172)
* [Yousef Hesham](https://github.com/yosefHesham)

### Back-End Team
* [Kerollos Magdy](https://github.com/kerolloz)
* [Kerollos Nabil](https://github.com/KerollosNabil)
* [Mohamed El-Raghy](https://github.com/mohamedelraghy)


#### Made with :heart: at FCI-SCU
