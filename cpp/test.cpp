
#include <iostream>
#include <vector>
#include <map>
#include <stdio.h>
#include <stdlib.h>
#include "base36.h"

void test_int()
{
 	long long n1 = 12;
	string s1 = CBase36::encodeInt(n1);
	cout << "[encodeInt] n1: " << n1 << ", s1: " << s1 << endl;

 	long long n2 = 123456;
	string s2 = CBase36::encodeInt(n2);
	cout << "[encodeInt] n2: " << n2 << ", s2: " << s2 << endl;

 	long long n3 = 287759938473219;
	string s3 = CBase36::encodeInt(n3);
	cout << "[encodeInt] n3: " << n3 << ", s3: " << s3 << endl;

	n1 = CBase36::decodeInt(s1);
	cout << "[dcodeInt] n1: " << n1 << endl;

	n2 = CBase36::decodeInt(s2);
	cout << "[dcodeInt] n2: " << n2 << endl;

	n3 = CBase36::decodeInt(s3);
	cout << "[dcodeInt] n3: " << n3 << endl;
}

void print_array(int iArr[], int len)
{
	cout << "{";
	for(int i = 0; i < len; i++)
	{
		if(i < len -1)
		{
			cout << iArr[i] << ", ";
		}else{
			cout << iArr[i];
		}
	}
	cout << "}";
}

void print_array(vector<int> iArr)
{
	int len = iArr.size();
	cout << "{";
	for(unsigned int i = 0; i < len; i++)
	{
		if(i < len -1)
		{
			cout << iArr[i] << ", ";
		}else{
			cout << iArr[i];
		}
	}
	cout << "}";
}

void test_array()
{
	int iArr1[] = {10, 11, 12, 13, 14, 15};
	string s1 = CBase36::encodeArray(iArr1, 6);
	cout << "[encodeArray] array1: "; 
	print_array(iArr1, 6);
	cout << ", s1: " << s1 << endl;

	vector<int> iArr2;
	iArr2.push_back(10);
	iArr2.push_back(11);
	iArr2.push_back(12);
	iArr2.push_back(13);
	iArr2.push_back(14);
	iArr2.push_back(15);
	string s2 = CBase36::encodeArray(iArr2);
	cout << "[encodeArray] array2: "; 
	print_array(iArr2);
	cout << ", s2: " << s2 << endl;

	vector<int> v1;
	CBase36::decodeArray(s1, v1);
	cout << "[decodeArray] s1: " << s1 << ", v1: "; 
	print_array(v1);
	cout << endl;
}

void test_random()
{
	string s;

	s = CBase36::randomString(3);
	cout << "[randomString] " << s << endl;

	s = CBase36::randomString(8);
	cout << "[randomString] " << s << endl;

	s = CBase36::randomString(8);
	cout << "[randomString] " << s << endl;

	s = CBase36::randomString(50);
	cout << "[randomString] " << s << endl;
}

int main()
{
	test_int();
	test_array();
	test_random();

	return 0;
}
