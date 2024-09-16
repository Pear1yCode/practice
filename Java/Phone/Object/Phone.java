package Java.Phone.Object;

import java.util.Scanner;

public class Phone {
    private boolean onAndOff;
    private boolean pattern;
    private int patternNumber;
    Scanner sc = new Scanner(System.in);

    public void on () {
        if(onAndOff){
            this.onAndOff = false;
            System.out.println("이미 전원이 켜져 있습니다.");
        } else {
            this.pattern = true;
            System.out.println("휴대폰의 전원을 켰습니다 :)");
        }
    }

    public void off () {
        if (onAndOff) {
            this.onAndOff = false;
            System.out.println("이미 전원이 꺼져 있습니다.");
        } else {
            this.onAndOff = true;
            this.pattern = false;
            System.out.println("휴대폰의 전원을 껐습니다.");
        }
    }
public void unlock () {
        if (pattern) {
            System.out.println("패턴을 입력하시오");
            System.out.println("1   2   3");
            System.out.println("4   5   6");
            System.out.println("7   8   9");
            int patternNumber = sc.nextInt();
            if (patternNumber == 13579) {
                System.out.println("휴대폰의 잠금이 풀렸습니다.");
            } else {
                this.pattern = true;
                System.out.println("휴대폰의 잠금해제를 실패하여 종료합니다. ");
            }
        } else {
        System.out.println("이미 잠금이 해제 돼 있습니다.");
    }
}

    public void app () {
        if (pattern) {
            System.out.println("앱을 실행합니다.");
        } else {
            System.out.println("잠금해제가 완료되지 않아 앱을 실행할 수 없습니다.");
        }
    }

    public void appEnd () {
        if (onAndOff) {
            System.out.println("앱을 종료합니다.");
        } else {
            this.pattern = false;
            System.out.println("휴대폰을 종료합니다.");
        }
    }


}
