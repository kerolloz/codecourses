sudo apt-get update

sudo apt-get install \
   apt-transport-https \
   ca-certificates \
   curl \
   software-properties-common \
   wget
   
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

sudo apt-key fingerprint 0EBFCD88

echo "WARNING: Ubuntu 18.10 users may have problems with the following command";
sudo add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
   stable"
echo "SOLUTION: replace $(lsb_release -cs) with Bionic";

sudo apt-get update

sudo apt-get install docker-ce

# If you would like to use Docker as a non-root user
# you should now consider adding your user to the “docker” group
# with something like:
sudo usermod -aG docker $USER
# Remember to log out and back in for this to take effect!

# download the judge image to the local docker repository
docker pull kerolloz/codecourses_judge

wget https://www.apachefriends.org/xampp-files/7.2.12/xampp-linux-x64-7.2.12-0-installer.run

sudo ./xampp-linux-x64-7.2.12-0-installer.run 