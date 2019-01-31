package traits

import (
	"github.com/kataras/iris"
	"github.com/kataras/iris/mvc"
)

type AddOperate struct{}

func (r *AddOperate) AddOperateHandler() mvc.Result {
	return mvc.Response{
		Object: iris.Map{"error": 0},
	}
}
