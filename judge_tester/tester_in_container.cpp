#include <bits/stdc++.h>

using namespace std;

void my_print(string s){
	cout << s << '\n';
}

int main ()  {

	int ret_val = 0;
	int number_of_test_cases = 0;
	string problem_dir_my_out = "/problem/test_cases/my_out/";
	string problem_dir_in_out = "/problem/test_cases/";
	string object_file_name = "/source_codes/a.out";
	string line;

	ifstream myfile("/problem/number_of_test_cases.txt");
	if (myfile.is_open())
	{
		while ( getline(myfile,line) )
		{
		  cout << "Test cases: " << line << '\n';
		  number_of_test_cases = stoi(line);
		}
		myfile.close();
	}

	bool judged = false;

	for(int i = 1; i <= number_of_test_cases; i++){
		judged = true;
	    string input_file = problem_dir_in_out + to_string(i) +".in";
	    string run_command = object_file_name + " < " + input_file + " > " + problem_dir_my_out + to_string(i) + ".out";
	    ret_val = system(run_command.c_str()); 
	    string diff_command = "diff -s -q -Z " + problem_dir_my_out  + to_string(i) + ".out " + problem_dir_in_out + to_string(i) + ".out";
	    ret_val = system(diff_command.c_str());
	    if(ret_val == 0) cout << "OKAY TEST " + to_string(i) << endl;
	    else { my_print("ERROR ON TEST " + to_string(i)); my_print("WRONG ANSWER"); return 1; }
	}
	
	if(judged)
		cout << "ACCEPTED\n";
	else
		return -1; // means that there's some problem in judging 

	return 0;
}
