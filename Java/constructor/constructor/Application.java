package Object.constructor;

import java.util.Scanner;

public class Application {
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);

        EmployeeDTO dto = new EmployeeDTO();
        System.out.println("고용된 사람의 숫자를 적으시오.");
        int number = sc.nextInt();
        dto.setNumber(number);
        System.out.println("이름을 적으시오.");
        String name = sc.next();
        dto.setName(name);
        System.out.println("부서를 적으시오.");
        String dept = sc.next();
        dto.setDept(dept);
        System.out.println("직업을 적으시오.");
        String job = sc.next();
        dto.setJob(job);
        System.out.println("나이를 적으시오.");
        int age = sc.nextInt();
        dto.setAge(age);
        System.out.println("성별을 적으시오. (남 & 여  택1)");
        char gender = sc.next().charAt(0);
        dto.setGender(gender);
        System.out.println("월급을 적으시오");
        int salary = sc.nextInt();
        dto.setSalary(salary);
        System.out.println("보너스 점수?");
        double bonusPoint = sc.nextDouble();
        dto.setBonusPoint(bonusPoint);
        System.out.println("휴대폰 번호를 적으시오.");
        String phone = sc.next();
        dto.setPhone(phone);
        System.out.println("주소를 적으시오 !");
        dto.setAddress(sc.nextLine());
        dto.setAddress(sc.nextLine());

        System.out.println(dto.getNumber());
        System.out.println(dto.getName());
        System.out.println(dto.getDept());
        System.out.println(dto.getJob());
        System.out.println(dto.getAge());
        System.out.println(dto.getGender());
        System.out.println(dto.getSalary());
        System.out.println(dto.getBonusPoint());
        System.out.println(dto.getPhone());
        System.out.println(dto.getAddress());
    }
}
