package Java.testQuestion.enlightenment;

import java.util.Scanner;

import java.util.ArrayList;

public class Application {
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        ArrayList <StudentClass> students = new ArrayList<>();

        for (int i = 0; i < 5; i++) {
            System.out.println("이름 입력");
            String name = sc.nextLine();
            System.out.println("직업 입력");
            String job = sc.nextLine();

            StudentClass stClass = new StudentClass(name, job);
            students.add(stClass);

        }
        sc.close();

        for(StudentClass stclass : students) {
            stclass.printInfo();
            System.out.println();
        }
        StudentClass firstStudent = students.get(0);
        firstStudent.printInfo();

        StudentClass secondStudent = students.get(1);
        secondStudent.printInfo();

        StudentClass thirdStudent = students.get(2);
        thirdStudent.printInfo();

        StudentClass forthStudent = students.get(3);
        forthStudent.printInfo();

        StudentClass fifthStudent = students.get(4);
        fifthStudent.printInfo();
    }
}
