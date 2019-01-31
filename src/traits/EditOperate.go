package traits

import (
	"github.com/kataras/iris"
	"github.com/kataras/iris/mvc"
)

type EditOperate struct{}

func (r *EditOperate) EditOperateHandle() mvc.Result {
	return mvc.Response{
		Object: iris.Map{"error": 0},
	}
}
