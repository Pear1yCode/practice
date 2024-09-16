package Java.testQuestion.team.numberTree;

import java.util.Scanner;

public class numberTree {
//    public void makeTree() {
//        String trees = " ";
//
//        for (int i = 1; i <= tree; i++){
//            System.out.println(trees);
////            trees += " " + i ;
//            for (int j = 1; j <= tree; j++) {
//                System.out.println(trees);
//                trees += " " + j;
//            }
//            trees += " ";

//    public void numTree (int n) {
//        System.out.print("트리 만들기 : ");
//        Scanner sc = new Scanner(System.in);
//        int tree = sc.nextInt();
//
//        for (int i = 0; i < n; ++i) {
//            for (int j = 0; j <= n+(n-1); ++j) {
//                if (j< n-1+i) {
//                    System.out.println(" ");
//                } else if (j > n-1 + i) {
//                    System.out.println(" ");
//                } else {
//                    System.out.println((i+1) % 10);
//                }
//                System.out.println();
//            }
//        }
//    }

//    public void numTree () {
//        System.out.println("숫자 피라미드 만들기 : ");
//        Scanner sc = new Scanner(System.in);
//        int num = sc.nextInt();
//
//
//        for (int i = num - (num - 1); i >= 1; i--){
//            for (int j = num - (num -1); j <= i; j++) {
//                System.out.print(" ");
//            }
//            for (int k = num - (num - 1); k <= num; k++) {
//                System.out.print(num + " ");
//            }
//            System.out.println();
//            num ++;
//        }
//    }

    // 이건 전체적으로 활용도가 높아보인다. // 내가 하고싶은 방식을 찾았다.
    public void numTree () {
        Scanner sc = new Scanner(System.in);
        System.out.println("값 입력 : ");
        int tree = sc.nextInt();
        for (int i = 1; i <= tree; i ++) {
            int blank = tree - i;

            all(" ", blank);

            all(i + " ", i);

            System.out.println(" ");
        }
    }

public void all (String a, int b) {
        for (int j = 0; j < b; j++) {
            System.out.print(a);
        }
}

    }
