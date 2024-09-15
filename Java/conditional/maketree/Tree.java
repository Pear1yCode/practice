package Java.testQuestion.maketree;

import java.util.Scanner;

public class Tree {
    StringBuilder sb = new StringBuilder();

    public void tr () {
        Scanner sc = new Scanner(System.in);
        System.out.print("트리 만들기 : ");
        int tree = sc.nextInt();
        String trees = "*";
        for (int i = 0; i <= tree; i ++) {
            System.out.print(sb.insert(0, " *"));
            System.out.println(trees.repeat(i));
                }
            }
        }
